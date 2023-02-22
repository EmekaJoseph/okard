<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\BlogModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BlogController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        $list =  BlogModel::select('blog_id', 'title', 'text', 'created_at')
            ->orderByDesc('created_at')->limit(10)->get();
        if (sizeof($list) > 0) {
            foreach ($list as $line) {
                $line->posted = (Carbon::parse($line->created_at))->diffForHumans();
            }
        }
        return response()->json($list, 200);
    }



    public function store(Request $request)
    {
        $title = $request->input('title');

        if (BlogModel::where('title', $title)->exists()) {
            return response()->json(['error' => 'title already exists'], 201);
        }

        $newBlog = new BlogModel();

        $newBlog->title = $title;
        $newBlog->text = $request->input('text');

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $nameArr = array();
            $pic_path = 'blog-images/';
            foreach ($images as $image) {
                $picName = $image->getClientOriginalName();
                $image->move($pic_path, $picName);
                array_push($nameArr, $picName);
            }
            $newBlog->images = implode(',', $nameArr);
        }

        return response()->json($newBlog, 200);
    }


    public function show(string $id)
    {
        //
    }



    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
