<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\RequestModel;
use App\Models\ImageSlideModel;


class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function getRequests(): JsonResponse
    {
        $list =  RequestModel::select('id', 'name', 'contact', 'created_at')
            ->orderBy('created_at', 'desc')->get();
        if (sizeof($list) > 0) {
            foreach ($list as $line) {
                $line->sent = (Carbon::parse($line->created_at))->diffForHumans();
            }
        }
        return response()->json(['data' => $list], 200);
    }

    public function requestDetails($id): JsonResponse
    {
        $userReq = RequestModel::find($id);
        if ($userReq) {
            $userReq->isRead = '1';
            $userReq->save();

            if ($userReq->refImage) {
                $img = ImageSlideModel::find($userReq->refImage);
                $userReq->refImage =  $img->img;
            }
        }

        return response()->json(['data' => $userReq], 200);
    }


    public function deleteRequest($id)
    {
        $userReq = RequestModel::find($id);

        //remove the uploaded file if exists
        if ($userReq) {
            if ($userReq->voiceNote) {
                $voiceNote = 'reqFiles/' . $userReq->voiceNote;
                if (file_exists($voiceNote)) {
                    unlink($voiceNote);
                }
            }
            if ($userReq->doc) {
                $doc = 'reqFiles/' . $userReq->doc;
                if (file_exists($doc)) {
                    unlink($doc);
                }
            }
            $userReq->delete();
        }

        return response()->json(['success' => 'deleted'], 200);
    }


    public function saveImageSlide(Request $req)
    {
        $image = new ImageSlideModel();

        $image->name = $req->input('name');
        $image->category = $req->input('category');
        $image->description = $req->input('description');
        $image->location = $req->input('location');
        $image->type = $req->input('type');
        $image->img = '';


        if ($req->file('img')) {
            $file = $req->file('img');
            $fileName = 'img-' . time() . '.' . $file->extension();

            $file->move('slides/', $fileName);

            $image->img = $fileName;
        }

        $image->save();


        return response()->json(['success' => 'saved'], 200);
    }


    public function getImageSlides()
    {
        return ImageSlideModel::all();
    }


    public function deleteImageSlide($ids)
    {
        $idsArr = explode(',', $ids);
        foreach ($idsArr as $id) {
            $this->deleteSlide($id);
        }

        return response()->json(['success' => 'deleted'], 200);
    }


    public function deleteSlide($id)
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

    public function newCategory(Request $req)
    {
        DB::table('tbl_categories')
            ->updateOrInsert(
                ['type' => $req->input('type'), 'name' => $req->input('name')],
                [
                    'type' => $req->input('type'),
                    'name' => $req->input('name')
                ]
            );

        return response()->json(['success' => 'saved'], 200);
    }

    public function getCategories()
    {
        $categories = DB::table('tbl_categories')->get();
        return response()->json($categories, 200);
    }
}
