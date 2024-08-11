<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\ItemList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function chatIndex(Conversation $conversation)
    {
        // dd($id);
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

    public function initiate($id)
    {
        $list = ItemList::find($id);
        // dd($list);
        // $conversation = Conversation::firstOrCreate([
        //     'user_one_id' => Auth::id(),
        //     'user_two_id' => $list->user_id,
        // ]); 
        

        $authId = Auth::id();
        $listUserId = $list->user_id;
        $conversation = Conversation::where(function ($query) use ($authId, $listUserId) {
            $query->where('user_one_id', $authId)
                  ->where('user_two_id', $listUserId);
        })->orWhere(function ($query) use ($authId, $listUserId) {
            $query->where('user_one_id', $listUserId)
                  ->where('user_two_id', $authId);
        })->first();
    
        if (!$conversation) {
            $conversation = Conversation::create([
                'user_one_id' => $authId,
                'user_two_id' => $listUserId,
            ]);
        }



        return redirect()->route('chat.show', ['conversation' => $conversation->id]);
        // return redirect('chat/' . $conversation->id);
    }
}
