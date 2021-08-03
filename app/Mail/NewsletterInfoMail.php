<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterInfoMail extends Mailable
{
    use Queueable, SerializesModels;


    public $infos_generales;
    public $sujet;
    public $corps_du_message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infos_generales,$sujet,$corps_du_message)
    {
        $this->infos_generales = $infos_generales;
        $this->sujet = $sujet;
        $this->corps_du_message = $corps_du_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->sujet)->view('emails.newsletter_info');
    }
}
