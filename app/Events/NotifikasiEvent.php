<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifikasiEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $judul;
    public $isi;
    public $link;
    public $userId;

    public function __construct($judul, $isi, $link, $userId)
    {
        $this->judul = $judul;
        $this->isi = $isi;
        $this->link = $link;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new Channel('notifikasi.' . $this->userId);
    }

    public function broadcastWith()
    {
        return [
            'judul' => $this->judul,
            'isi' => $this->isi,
            'link' => $this->link
        ];
    }
}
