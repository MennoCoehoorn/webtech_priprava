@extends('our_layouts.cart_layout')

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