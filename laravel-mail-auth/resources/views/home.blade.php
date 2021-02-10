@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <h3>Welocome {{Auth::user()-> name}}, this is your form to send email!</h3>

                    {{-- STEP 3: creiamo form e route per inviare post(dati che si salvano) alla HomeController per prossimo step--}}
                    <form class="" action="{{route('send-mail')}}" method="post">

                      @csrf
                      @method('post')

                      <label for="email-text">Email text</label>
                      <br>
                      {{-- <input type="text" name="email-text"> --}}
                      <textarea name="email-text" rows="4" cols="50" onkeyup="countChar(this)"></textarea>
                      <div id="charNum"></div>
                      @error ('email-text')

                        <p style="color:red">{{$errors->first()}}</p>

                      @enderror

                      <br>

                      <input type="submit" value="SEND">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
