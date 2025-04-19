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

class NotifikasiRujukanUser implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rujukan;
    public $link;

    /**
     * Create a new event instance.
     */
    public function __construct($rujukan, $link)
    {
        $this->rujukan = $rujukan;
        $this->link = $link;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.' . $this->rujukan->faskes_id);
    }


    public function broadcastWith()
    {
        return [
            'judul' => 'Status Rujukan Diperbarui',
            'isi' => "Status rujukan No. {$this->rujukan->No_Rujukan} telah diperbarui.",
            'link' => $this->link,
        ];
    }
}
