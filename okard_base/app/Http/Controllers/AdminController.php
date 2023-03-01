<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\RequestModel;
use App\Models\ImageSlideModel;
use Illuminate\Support\Str;


class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function login(Request $req)
    {
        // DB::table('tbl_account')->insert([
        //     'username' => 'okard',
        //     'password' => Hash::make('admin123'),
        // ]);

        $username = $req->input('username');
        $password = $req->input('password');

        $account = DB::table('tbl_account')->where('username', $username);
        $row =  $account->first();

        if (!$row) {
            return response()->json('invalid details', 203);
        }

        if (!Hash::check($password, $row->password)) {
            return response()->json('invalid details', 203);
        }

        $account->update(['last_login' => Carbon::now()]);

        $data = [
            'id' => $row->id,
            'username' => $row->username,
            'role' => $row->role,
        ];

        return response()->json($data, 200);
    }

    public function getAccount($id)
    {
        $account = DB::table('tbl_account')
            ->select('id', 'username', 'role')
            ->find($id);

        return response()->json($account, 200);
    }


    public function passwordChange(Request $req)
    {
        $id = $req->input('id');
        $table = DB::table('tbl_account');
        $account = $table->find($id);

        $oldPass = $req->input('oldPass');

        if (!Hash::check($oldPass, $account->password)) {
            return response()->json('invalid details', 203);
        }
        $newHash = Hash::make($req->input('newPass'));

        $table->where('id',  $id)->update(['password' => $newHash]);

        return response()->json('success', 200);
    }





    public function getRequests(): JsonResponse
    {
        $list =  RequestModel::select('id', 'name', 'contact', 'isRead', 'created_at')
            ->orderBy('created_at', 'desc')->get();
        if (sizeof($list) > 0) {
            foreach ($list as $line) {
                $line->sent = (Carbon::parse($line->created_at))->diffForHumans();
            }
        }
        return response()->json($list, 200);
    }

    public function requestDetails($id): JsonResponse
    {
        $userReq = RequestModel::find($id);
        if ($userReq) {
            $userReq->isRead = '1';
            $userReq->save();

            if ($userReq->refImage) {
                $ids = explode(',', $userReq->refImage);
                $imgs = ImageSlideModel::find($ids);
                $userReq->refImage =  $imgs;
            }
        }

        return response()->json($userReq, 200);
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

    public function deleteCategory($id)
    {
        DB::table('tbl_categories')->where('id', $id)->delete();
    }
}
