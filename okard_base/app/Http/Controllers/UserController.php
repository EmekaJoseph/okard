<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\RequestModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function sendRequest(Request $req)
    {

        $userReq = new RequestModel();
        $userReq->name = $req->input('name');
        $userReq->contact = $req->input('contact');
        $userReq->message = $req->input('message');
        $userReq->type = $req->input('type');
        $userReq->refImage = $req->input('refImage');


        if ($req->file('voiceNote')) {
            $file = $req->file('voiceNote');
            $fileName = 'voiceNote-' . time() . '.' . $file->extension();

            $file->move('reqFiles/', $fileName);

            $userReq->voiceNote = $fileName;
        }

        if ($req->file('doc')) {
            $file = $req->file('doc');
            $fileName = 'doc-' . time() . '.' . $file->extension();

            $file->move('reqFiles/', $fileName);

            $userReq->doc = $fileName;
        }

        $userReq->save();

        return response()->json(['message' => 'saved'], 200);
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
