<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $userId,$Account,$subjectTitle,$email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->userId = Auth::id();
        $this->Account = Auth::user()->username;
        $this->subjectTitle = $request->post('subject');
        $this->email = $request->post('email');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('712340817@qq.com')->subject($this->subjectTitle)->with([
            'username' => $this->Account,
            'userid' => $this->userId,
            'email' => $this->email
        ])->view('email.bind_mail');
    }
}
