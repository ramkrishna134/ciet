<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The message instance.
     *
     * @var \App\Models\Message
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        //
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status updated for the Request id #'. $this->message->id)->view('admin.message.status')->with([
            'id' => $this->message->id,
            'status' => $this->message->status,
            'name'  => $this->message->user->name,
            'title' => $this->message->title,
        ]);
    }
}
