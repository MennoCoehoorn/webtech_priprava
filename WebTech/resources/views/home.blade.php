@extends('our_layouts.nav_footer')

@section('header')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/login_styles.css">
        <link rel="stylesheet" href="/css/main_styles.css">
        <link 
            href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
            rel="stylesheet"  type='text/css'>

        <script type="text/javascript" src="/js/all-scripts.js"></script>
        <title>Fess Handry</title>
    </head>
    <body>

@endsection

@section('content')
<div class="container jumbo">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fess Handry') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class='text-center'>{{ __('Ste prihlásený! Vitajte!') }}</div>

                                <p class='text-center'>
                                    {{ Auth::user()->name }}
                                </p>

                                <section class="text-center bottom_buttons">
                                    <a href="/landing" class="btn btn-info bt-lg logout-btns" role="button">Návrat na hlavnú obrazovku</a><br>
                                    <a class="btn btn-secondary bt-lg logout-btns" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odhlásiť sa') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </section>

                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottom')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

 </body>
 </html> 

 @endsection
