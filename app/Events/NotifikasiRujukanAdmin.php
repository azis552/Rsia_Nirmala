<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NotifikasiRujukanAdmin implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rujukan;
    public $link;

    public function __construct($rujukan , $link)
    {
        $this->rujukan = $rujukan;
        $this->link = $link;
    }
    public function broadcastOn()
    {
            return new Channel('admin-notifikasi');
    }

    public function broadcastWith()
    {
        return [
            'judul' => 'Rujukan Baru',
            'isi' => "Ada rujukan baru dengan No. Rujukan: {$this->rujukan->No_Rujukan}",
            'link' => $this->link,
        ];
    }
}
