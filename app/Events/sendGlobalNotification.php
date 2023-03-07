<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class sendGlobalNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    // public function __construct($message)
    // {
    //     $options = array(
    //         'cluster' => 'ap1',
    //         'useTLS' => true
    //     );
    //     $pusher = new Pusher\Pusher(
    //         '635466c2765ece12d468',
    //         '4029aa215ead14872575',
    //         '1563594',
    //         $options
    //     );

    //     $data['message'] = $this->message = $message;
    //     $pusher->trigger('my-channel', 'my-event', $data);
    // }
}
