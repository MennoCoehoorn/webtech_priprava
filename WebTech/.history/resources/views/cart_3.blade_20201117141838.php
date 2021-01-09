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

@section('content')
<div class="container">

            <section class="cart_header">
                
                <h1>Nákupný košík</h1>
        
                <div class="text-center">
                    <picture>
                        <source media="(min-width: 1200px)" srcset="/img/circles3.png">
                        <source media="(min-width: 992px)" srcset="/img/circles3-md.png">
                        <img class = "circles" src="/img/circles3-xs.png" alt="circles1">
                    </picture>
                </div>

                <h2>Ďakujeme za váš nákup</h2>
            </section>
            
            <article class="jumbotron">
                <h3>Detaily vytvorenej objednávky:</h3>
                <hr>

                <section class="order_info">
                    <h5>Meno:</h5>
                    <p id="ordedName">{{$cart_3_info->name}}</p>
                </section>
                
                <section class="order_info">
                    <h5>Priezvisko:</h5>
                    <p id="orderSurname">{{$cart_3_info->surname}}</p>
                </section>
                <hr>

                <section class="order_info">
                    <h5>Adresa:</h5>
                    <p id="address">{{$cart_3_info->address1}}, {{$cart_3_info->address2}}</p>
                </section>    
                <hr>

                <section class="order_info">
                    <h5>Spôsob platby:</h5>
                    <p id="orderPayment">{{$cart_3_info->payment}}</p>
                </section>
                
                <section class="order_info">
                    <h5>Cena nákupu spolu s poštovným:</h5>
                    <p id="orderPrize">{{$cart_3_info->price}}€</p>
                </section>
                <hr>

                <section class="order_info">
                    <h5>Spôsob doručenia:</h5>
                    <p id="orderTransport">{{$cart_3_info->transport}}</p>
                </section>

                <section class="order_info">
                    <h5>Očakávaný dátum doručenia:</h5>
                    <p id="orderDate">{{$cart_3_info->date_arrive}}</p>
                </section>
                <hr>

                <section class="order_info">
                    <h5>Číslo objednávky:</h5>
                    <p id="orderID">{{$cart_3_info->order_id}}</p>
                </section>

                <hr>
                <section class="text-center">
                    <h5>Ak ešte nemáš účet, možeš sa tu zaregistrovať</h5>
                    <a href="/register" class="btn btn-info bt-lg" role="button">Zaregistrovať sa</a>
                </section>
                <hr>
            </article>

            <section class="text-center bottom_buttons">
                <a href="/landing" class="btn btn-info bt-lg" role="button">Návrat na hlavnú obrazovku</a>
            </section>
        </div>
        
@endsection

@section('bottom')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

 </body>
 </html> 

 @endsection