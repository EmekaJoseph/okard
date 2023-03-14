<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\EnquiryModel;

class UserEnquiryController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        $list =  EnquiryModel::select('id', 'name', 'contact', 'isRead', 'created_at', 'type')
            ->orderBy('created_at', 'desc')->get();
        if (sizeof($list) > 0) {
            foreach ($list as $line) {
                $line->sent = (Carbon::parse($line->created_at))->diffForHumans();
            }
        }
        return response()->json($list, 200);
    }


    public function store(Request $req)
    {
        $userReq = new EnquiryModel();
        $userReq->name = $req->input('name');
        $userReq->contact = $req->input('contact');
        $userReq->message = $req->input('message');
        $userReq->type = $req->input('type');
        $userReq->refImage = $req->input('refImage');
        $userReq->totalPrice = $req->input('totalPrice');


        try {
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
        } catch (\Throwable $th) {
            //throw $th;
        }

        $userReq->save();

        // send mail to okard

        return response()->json(['message' => 'saved'], 200);
    }


    public function show(string $id)
    {
        $userReq = EnquiryModel::find($id);
        if ($userReq) {
            $userReq->isRead = '1';
            $userReq->save();

            if ($userReq->refImage) {
                $userReq->refImage = json_decode($userReq->refImage);
            }
        }

        return response()->json($userReq, 200);
    }



    public function destroy(string $id)
    {
        $userReq = EnquiryModel::find($id);

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
}
