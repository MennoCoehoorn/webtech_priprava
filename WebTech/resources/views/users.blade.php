@extends('our_layouts.nav_footer')

@section('header')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main_styles.css">
        <link 
            href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
            rel="stylesheet"  type='text/css'>
        <link rel="stylesheet" href="/css/users_styles.css">

        <script type="text/javascript" src="/js/all-scripts.js"></script>
        <!-- Zdroj obrázku :https://store.royalbloodband.com/collections/clothing/products/how-dark-tee-glow-in-the-dark-->
        <title>Fess Handry</title>
    </head>
    <body>
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <h2 class="title_users">Vitajte v časti vyhradenej pre prihlásených používateľov</h2>
                </div>
            </div>

            <div class="user_info row">
                <div class="col">
                    <h3>Ahoj <p class="highlight_word name_word">{{$user->name}}</p>, tvoj email, je: <p class="highlight_word">{{$user->email}}</p></h3>
                </div>    
            </div>
            
            <div class="row test_text_things">
                <div class="test_text col">
                    <h3>Test_text: {{$test_text->text}}</h3>
                </div>

                @can('update',$test_text)
                <div class="admin_things col">
                    <form action="/modify" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" class="modify_input" name="modify">
                        <button type="submit" class="btn btn-info">Upraviť</button>
                    </form>
                </div>
                @endcan
            </div>

            <div class="row">
                <div class="col">
                    <p class="hello">Hello</p>
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