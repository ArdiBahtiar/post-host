<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class Chat extends Component
{
    public $messages = [];
    public $newMessage;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => $this->user->id,
            'message' => $this->newMessage,
        ]);

        $this->newMessage = '';
    }

    public function render()
    {
        $this->messages = Message::with('user')->get();
        
        return view('livewire.chat');
    }
}