<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\PortfolioModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class PortfolioController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        $list =  PortfolioModel::select('id', 'title', 'created_at', 'image', 'category')
            ->orderByDesc('created_at')->limit(10)->get();

        return response()->json($list, 200);
    }



    public function store(Request $request)
    {
        $title = $request->input('title');

        if (PortfolioModel::where('title', $title)->exists()) {
            return response()->json(['error' => 'title already exists'], 203);
        }

        $newItem = new PortfolioModel();

        $newItem->title = $title;
        $newItem->text = $request->input('text');
        $newItem->category = $request->input('category');

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = 'portfolio-' . time() . '.' . $file->extension();

            $img = Image::make($file);
            $img->resize(800, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save('portfolios/' . $fileName);

            $newItem->image = $fileName;
        }

        $newItem->save();

        return response()->json($newItem, 200);
    }


    public function show(string $id)
    {
        $item = PortfolioModel::find($id);

        if (!$item) {
            return response()->json('not found', 203);
        }

        return response()->json($item, 200);
    }

    public function update(Request $request, string $id)
    {
        $item = PortfolioModel::find($id);

        $item->title = $request->input('title');
        $item->text = $request->input('text');
        $item->category = $request->input('category');

        return response()->json($item->save(), 200);
    }


    public function destroy(string $id)
    {
        $item = PortfolioModel::find($id);

        if (!$item) {
            return response()->json('not found', 203);
        }

        if ($item->image) {
            $imgFile = 'portfolios/' . $item->image;
            if (file_exists($imgFile)) {
                unlink($imgFile);
            }
        }

        $item->delete();

        return response()->json('deleted', 200);
    }
}
