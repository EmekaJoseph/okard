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
        $account = DB::table('tbl_account')->find($id);

        $oldPass = $req->input('oldPass');

        if (!Hash::check($oldPass, $account->password)) {
            return response()->json('invalid details', 203);
        }
        $newHash = Hash::make($req->input('newPass'));

        DB::table('tbl_account')->where('id',  $id)->update(['password' => $newHash]);

        return response()->json('success', 200);
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


    public function getContact()
    {
        $data =  DB::table('tbl_contact')->where('id', 1)->first();
        return response()->json($data);
    }


    public function updateContact(Request $req)
    {
        $data = [
            'address' => $req->input('address'),
            'phone' => $req->input('phone'),
            'email' => $req->input('email'),
            'last_update' => Carbon::now()
        ];

        DB::table('tbl_contact')->where('id', 1)->update($data);

        return response()->json('success', 200);
    }


    public function isVisitor(Request $req)
    {
        DB::table('tbl_visitors')
            ->updateOrInsert(
                ['ip_addr' => $req->ip()],
                ['ip_addr' => $req->ip(), 'visit_date' => Carbon::now()]
            );
    }
}
