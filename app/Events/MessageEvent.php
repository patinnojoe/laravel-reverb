<?php

namespace App\Events;

use App\Models\Mesage;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class MessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $user_name;
    /**
     * Create a new event instance.
     */
    public function __construct($user_id, $message)
    {
        $newMessage = new Mesage();
        $newMessage->user_id = $user_id;

        $newMessage->message = $message;
        $newMessage->save();

        $this->message = $message;
        $this->user_name = User::find($user_id)->name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('our-chanel'),
        ];
    }
}
