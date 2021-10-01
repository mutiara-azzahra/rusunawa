<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RusunawaBanjarmasinEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("pengirim@rusunawa.com")
                    ->view('email-rusunawa')
                    ->with(
                        [
                            'nama'      => $this->user->nama_user,
                            'website'   => 'www.rusunawa.banjarmasinkota.go.id',
                        ]
                    );
    }
}
