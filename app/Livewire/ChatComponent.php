<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $message;
    public $messages;

    protected $rules = [
        'message' => 'required|string|max:255',
    ];
    // public function rules()
    // {
    //     return [
    //         'message' => 'required|string|max:255',
    //     ];
    // }

    public function mount()
    {
        // $this->rules;
        $this->messages = Message::with('user')->latest()->get();
    }

    public function sendMessage()
    {
        $this->validate();

        $newMessage = Message::create([
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->messages->prepend($newMessage);
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
