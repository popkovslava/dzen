<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Requests\SendRequest;

class SendProposalUser extends Mailable
{
    use Queueable, SerializesModels;

    public $sendrequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SendRequest $sendrequest)
    {
        $this->sendrequest = $sendrequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Hey {$this->sendrequest->input('firstName', '')}, got your proposal request!";
        return $this->view('email.user')->with($this->sendrequest->all())->subject($subject);
    }
}
