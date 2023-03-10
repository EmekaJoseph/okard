<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\MessageModel;

class MessageController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        $list =  MessageModel::select('id', 'name', 'subject', 'isRead', 'created_at', 'contact')
            ->orderByDesc('created_at')->limit(20)->get();

        if (sizeof($list) > 0) {
            foreach ($list as $line) {
                $line->sent = (Carbon::parse($line->created_at))->diffForHumans();
            }
        }

        return response()->json($list, 200);
    }



    public function store(Request $request)
    {
        $newMessage = new MessageModel();

        $newMessage->name = $request->input('name');
        $newMessage->contact = $request->input('contact');
        $newMessage->subject = $request->input('subject');
        $newMessage->text = $request->input('text');

        $newMessage->save();

        return response()->json('saved', 200);
    }


    public function show(string $id)
    {
        $message = MessageModel::find($id);

        if (!$message) {
            return response()->json('post not found', 203);
        }

        $message->isRead = '1';
        $message->save();

        return response()->json($message, 200);
    }

    public function destroy(string $id)
    {
        $message = MessageModel::find($id);

        if (!$message) {
            return response()->json('post not found', 203);
        }

        $message->delete();

        return response()->json('deleted', 200);
    }
}
