<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // public function chatIndex()
    // {
    //     return view('pages.chat');
    // }

    public function chatIndex(Conversation $conversation)
    {
        if(!in_array(Auth::id(), [$conversation->user_one_id, $conversation->user_two_id]))
        {
            abort(403, 'Lu itu ngga diajak :( ');
        }

        return view('pages.chat', ['conversationId' => $conversation->id]);
    }

    public function store(Request $request)
    {
        $message = new Message();
        $message->user_id = Auth::id();
        $message->message = $request->message;
        $message->save();

        return response()->json($message, 201);
    }
}
