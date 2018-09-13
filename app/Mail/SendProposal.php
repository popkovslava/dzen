<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Requests\SendRequest;

class SendProposal extends Mailable
{
    use Queueable, SerializesModels;

    public $sendrequest;
    public $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SendRequest $sendrequest, $files = [])
    {
        $this->sendrequest = $sendrequest->all();
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('email.send')->with($this->sendrequest);

        foreach ($this->files as $filePath) {
            $email->attach($filePath);
        }
        return $email;
    }
}
