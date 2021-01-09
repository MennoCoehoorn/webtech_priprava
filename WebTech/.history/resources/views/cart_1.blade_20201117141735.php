@extends('our_layouts.nav_footer')

@section('header')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/cart_styles.css">
        <link rel="stylesheet" href="/css/main_styles.css">
        <link 
            href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
            rel="stylesheet"  type='text/css'>

        <script type="text/javascript" src="/js/all-scripts.js"></script>
        <!-- Zdroj obrázku :https://store.royalbloodband.com/collections/clothing/products/how-dark-tee-glow-in-the-dark-->
        <title>Fess Handry</title>
    </head>
    <body>
@endsection

@section('content')            
<div class="container">

            <section class=cart_header>
                <h1>Nákupný košík</h1>
            
                <div class="text-center">
                    <picture>
                        <source media="(min-width: 1200px)" srcset="/img/circles1.png">
                        <source media="(min-width: 992px)" srcset="/img/circles1-md.png">
                        <img class = "circles" src="/img/circles1-xs.png" alt="circles1">
                    </picture>
                </div>
        
                <h2>Prehľad nákupného košíka</h2>
            </section>
            

            <article class="jumbotron">

                <h3>Položky v košíku</h3>
                <hr>


                <article class="cart_items_scroll">

                    @foreach($entries as $entry)
                        <section class="row cart_item">
                            
                            <div class="col-md-3 product_pic d-none d-sm-block">
                                <picture>
                                    <source media="(min-width: 1200px)" srcset="{{$entry->picture_path_bg}}">
                                    <img src="{{$entry->picture_path_md}}" alt="product_pic">
                                </picture>
                            </div>
                            
                            <section class="product_part col-md-4 ">
                                <ul>
                                    <li><h4 id="product_name">{{$entry->product_name}}</h4></li>
                                    <li><h6>Farba:</h6><p>{{$entry->color}}</p></li>
                                    <li><h6>Veľkosť:</h6><p>{{$entry->size}}</p></li>
                                    <li> 
                                        <form action="/quantupdate" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$entry->sub_id}}">
                                            <input type="number" name="quant" value="{{$entry->quantity}}" min="1" max="100" step="1">
                                            <button type="submit" class="btn btn-info btn-sm zm-btn">Zmeniť</button>
                                        </form>     
                                    </li>
                                </ul>
                            </section>

                            <section class="product_part col-md-4 ">
                                <ul>
                                    <li class="top_row"><h6>Cena za kus:</h6><p>{{$entry->product_price}}€</p></li>
                                    <li><h6>Cena:</h6><p>{{$entry->price_total}}€</p></li>
                                </ul>
                            </section>

                            <section class="product_part col-md-1">
                                <form action="{{url('cart1', [$entry->sub_id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-info btn-sm float-md-none float-right remove_btn" value="X"/>
                                </form>
                            </section>
        
                        </section>
                    @endforeach

                    
                </article>

            </article>

            
            <section class="order_info">
                <h5>Počet položiek spolu:</h5>
                <p id="itemsCount">{{$total_quantity}} ks</p>
            </section>

            <section class="order_info">
                <h5>Cena za položky:</h5>
                <p id="itemsPrice">{{$total_price}} €</p>
            </section>


            <section class="bottom_buttons">
                <a href="/landing" class="btn btn-info bt-lg" role="button">Späť</a>
                <a href="/cart2" class="btn btn-info bt-lg float-md-right" role="button">Pokračovať k objednávke</a>
            </section>
                
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
        
