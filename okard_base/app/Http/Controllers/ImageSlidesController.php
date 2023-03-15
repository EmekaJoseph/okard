<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use App\Models\ImageSlideModel;
use Intervention\Image\ImageManagerStatic as Image;

class ImageSlidesController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        return ImageSlideModel::all();
    }

    public function store(Request $req)
    {
        $image = new ImageSlideModel();

        $image->name = $req->input('name');
        $image->category = $req->input('category');
        $image->description = $req->input('description');
        $image->location = $req->input('location');
        $image->type = $req->input('type');
        $image->price = $req->input('price');
        $image->img = '';


        if ($req->file('img')) {
            $file = $req->file('img');
            $fileName = 'img-' . time() . '.' . $file->extension();

            $img = Image::make($file);
            $img->resize(800, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save('slides/' . $fileName);

            // $file->move('slides/', $fileName); ######### old, dont use..

            $image->img = $fileName;
        }

        $image->save();


        return response()->json(['success' => 'saved'], 200);
    }


    public function show(string $id)
    {
        $item = ImageSlideModel::find($id);

        if (!$item) {
            return response()->json('not found', 203);
        }

        return response()->json($item, 200);
    }

    public function update(Request $req, string $id)
    {
        $item = ImageSlideModel::find($id);

        $item->name = $req->input('name');
        // $item->category = $req->input('category');
        $item->description = $req->input('description');
        $item->location = $req->input('location');
        // $item->type = $req->input('type');
        $item->price = $req->input('price');

        return response()->json($item->save(), 200);
    }


    public function destroy(string $ids)
    {
        $idsArr = explode(',', $ids);
        foreach ($idsArr as $id) {
            $this->deleteSlide($id);
        }

        return response()->json(['success' => 'deleted'], 200);
    }

    private function deleteSlide($id)
    {
        $image = ImageSlideModel::find($id);

        if ($image) {
            $imgFile = 'slides/' . $image->img;
            if (file_exists($imgFile)) {
                unlink($imgFile);
            }
            $image->delete();
        }
    }
}
