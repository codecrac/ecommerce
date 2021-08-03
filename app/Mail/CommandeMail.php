<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $infos_generales;
    public $la_commande;
    public $objet;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$infos_generales,$la_commande)
    {
        $this->subject = $subject;
        $this->infos_generales = $infos_generales;
        $this->la_commande = $la_commande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.commande');
    }
}
