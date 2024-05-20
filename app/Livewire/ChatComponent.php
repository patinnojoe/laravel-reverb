<?php

namespace App\Livewire;

// use GuzzleHttp\Psr7\Message;

use App\Events\MessageEvent;
use App\Models\Mesage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class ChatComponent extends Component
{
    public $message;
    public $convo = [];


    public function mount()
    {


        $messages =  Mesage::all();

        foreach ($messages as $message) {
            $this->convo[] = [
                'username' => $message->user->name,
                'message' => $message->message
            ];
        }
    }


    #[On('echo:our-chanel,MessageEvent')]
    public function listenForMessage($data)
    {
        $this->convo[] = [
            'username' => $data['user_name'],
            'message' => $data['message']
        ];
    }

    public function submitMessage()
    {
        MessageEvent::dispatch(Auth::user()->id, $this->message);

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
