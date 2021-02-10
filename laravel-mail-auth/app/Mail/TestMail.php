<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailString;

    public function __construct($mailString)
    {
      $this -> mailString = $mailString;
    }


    public function build()
    {
        // PRIMO STEP: inseriamo from per dare indirizzo default di chi invia email e correggiamo view verso pagina front end che vedremo nella mail inviata;
        // class creiamo variabile public da utilizzare in contruct che poi utilizzeremo per stampare in front-end(vai HomeController secondo step)
        return $this-> from('noreply@laravelexercise.com')->view('mail.test-mail');
    }
}
