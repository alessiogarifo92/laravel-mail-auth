<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// SECONDO STEP: aggiungo percorsi per recupero dati auth,mail e collego con Mail\TestMail;
//in index otteniamo l email dell utente e la inviamo al nostro TestMail che farà arrivare su mailtrap la nostra prima email(se abbiamo gia scritto qualcosa in test-mail.blade.php) e new TestMail('') deve avere virgolette senno da errore e corrisponde a testo {{$mainString}} se aggiunto in test-mail.blade.php(terzo step in home.blade.php creiamo il form);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // STEP 4: creiamo funzione per raccogliere info da form facendo una validazione e inviando poi dati a new TestMail('') inserendo in questo caso tra parentesi l info che verra passata come $mailString

    public function sender(Request $request){
      $data = $request->validate([
        'email-text' => 'required|min:5|max:255'
      ]);
      // dd($data);

      Mail::to(Auth::user()-> email)
            -> send (new TestMail($data['email-text']));

      return redirect() -> back();
    }


    public function index()
    {
      // N.B SE NON COMMENTIAMO QUESTO OGNI VOLTA RICEVERO DUE EMAIL UNA SENZA INFO INPUT L ALTRO CON 

      // $mail = Auth::user()-> email;
      // // dd($mail);
      // Mail::to($mail) -> send(new TestMail(''));
      return view('home');
    }
}
