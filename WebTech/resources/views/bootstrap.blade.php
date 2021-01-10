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

        <link rel="stylesheet" href="/css/bootstrap_styles.css">

        <script type="text/javascript" src="/js/all-scripts.js"></script>
        <!-- Zdroj obrázku :https://store.royalbloodband.com/collections/clothing/products/how-dark-tee-glow-in-the-dark-->
        <title>Fess Handry</title>
    </head>
    <body>
@endsection

@section('content')

<div class="jumbotron jumbotron-fluid bg-info text-white">
    <div class="container justify-content-center">
        <h2 class="display-2">Všetci používatelia</h2>
    </div>
</div>

<div class="container">
    <nav class="nav justify-content-center nav-pills flex-columns flex-md-row">
        @foreach($users as $user)
        <a class="nav-link bg-info text-white mx-1" href="#user-{{$user->id}}" data-toggle="tab">{{$user->name}}</a>
        @endforeach
    </nav>

    <div class="tab-content py-5">
        @foreach($users as $user)
        <div class="tab-pane user_info" id="user-{{$user->id}}">
            <h3>{{$user->name}} -- {{$user->email}}</h3>
            @if($user->deliveryinfo)
            <h4>{{$user->deliveryinfo->address}},{{$user->deliveryinfo->city_state}}</h4>
            @endif
            <p>
                {{$user->name}} sa u nás zaregistroval/a {{$user->created_at}}
            </p>
            @if(count($user->roles) > 0)
            @foreach($user->roles as $role)
                <h4>{{$user->name}} má rolu {{$role->name}}</h4>
            @endforeach
            @else
            <h4>{{$user->name}} nemá určenú rolu</h4>
            @endif
        </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-6">
                <img src="/img/svet-tricko-md.jpg" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <img src="/img/sukna-karo-md.jpg" alt="" srcset="">
            </div>
        </div>

        <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, qui vero dolores odit iusto numquam sunt iure dolor recusandae in optio pariatur eum id quasi voluptatum eius illum aliquam quod!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quia ipsa nemo cupiditate. Mollitia ipsum molestias distinctio dolorum cupiditate repellendus voluptas sint alias quisquam reprehenderit doloribus, at, pariatur modi architecto.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor excepturi eum explicabo molestiae veniam ab exercitationem voluptate a, dolores saepe vero eligendi repellat odit? Consectetur earum quae error tempore blanditiis.</p>
        </div>
    </div>
    <div class="row bg-info text-white">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam voluptas minus aliquid maxime! Culpa itaque vero quos laboriosam velit, soluta, dignissimos alias fugit animi nihil deleniti rerum officiis maiores molestias.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium excepturi minus hic, dolorem est tenetur voluptate tempora aut, culpa, repellat nesciunt. Voluptatum modi, illo iure nulla repudiandae hic quod ducimus.
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga veniam odio suscipit assumenda qui sed fugiat deleniti aspernatur at, debitis excepturi explicabo maxime, magni hic rem exercitationem incidunt esse reiciendis.
        </p>
    </div>
</div>

<div class="container">
    @foreach($articles as $article)
    <article class="bg-success rounded my-5 pb-5">
        <div class="row">
            <h3 class="display-3 px-5 py-5 text-white "><u>{{$article->title}}</u></h3>
        </div>
        <div class="row">
            <div class="col-md-4 mx-5">
                <img src="{{$article->picture->picture_path}}" alt="" class="article_pic">
            </div>
            <div class="col-md-6 article_content">
                <p>
                    {{$article->content}}
                </p>
            </div>
        </div>

    </article>
    @endforeach
</div>

@endsection


@section('bottom')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

 </body>
 </html> 

 @endsection
        
