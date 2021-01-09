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
            
            <section class="cart_header"> 
                <h1>Nákupný košík</h1>
            
                <div class="text-center">
                    <picture>
                        <source media="(min-width: 1200px)" srcset="/img/circles2.png">
                        <source media="(min-width: 992px)" srcset="/img/circles2-md.png">
                        <img class = "circles" src="/img/circles2-xs.png" alt="circles1">
                    </picture>
                </div>
            
                <h2>Detaily objednávky</h2>
            </section>
            
            
            <article class="jumbotron">
                
                @empty($user)
                <section class="text-center">
                    <a href="/login" class = "btn btn-info btn-lg" role="button">Máte už účet? - Prihlásiť sa</a>
                </section>
                @endempty
                

                
                <form action="/order" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$order_id}}">
                    <input type="hidden" name="total_p" value="{{$total_p}}">
                    
                    <h3>Dodacie informácie</h3>
                    <hr>

                    <section class="form-group">
                        <label for="firstname">Meno:</label>
                        <input id="firstname" name="firstname" class="form-control" type="text" value="{{$d_info->name}}" required>
                    </section>
                    

                    <section class="form-group">
                        <label for="surname">Priezvisko:</label>
                        <input id="surname" name="surname" class="form-control" type="text" value="{{$d_info->surname}}" required>
                    </section>
                    
                    <section class="form-group">
                        <label for="phone">Telefón:</label>
                        <input id="phone" name="phone" class="form-control" type="text" value="{{$d_info->phone}}" required>
                    </section>

                    <section class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" name="email" class="form-control" type="email" value="{{$d_info->email}}" required>
                    </section>
                    
                    
                    <h4>Adresa</h4>
                    

                    <section class="form-group">
                        <label for="cityState">Mesto a krajina:</label>
                        <input id="cityState" name="cityState" class="form-control" type="text" value="{{$d_info->city_state}}"required>
                    </section>
                    
                    <section class="form-group">
                        <label for="address">Ulica a číslo:</label>
                        <input id="address" name="address" class="form-control" type="text" value="{{$d_info->address}}"required>
                    </section>

                    <section class="form-group">
                        <label for="postalCode">PSČ:</label>
                        <input id="postalCode" name="postalCode" class="form-control" type="text" value="{{$d_info->postal_code}}"required>
                    </section>
                    

                    <h3>Fakturačné informácie</h3>
                    <hr>

                    <section class="form-check">
                        <input id="sameInfoCheck" type="checkbox" class="form-check-input" name="sameInfoCheck" value="1">
                        <label for="sameInfoCheck" class="form-check-label">Fakturačné informácie sú rovnaké ako dodacie</label>
                    </section>
                    <hr>

                    <section class="form-group">
                        <label for="firstnameF">Meno:</label>
                        <input id="firstnameF" name="firstnameF" class="form-control" type="text">
                    </section>

                    <section class="form-group">
                        <label for="surnameF">Priezvisko:</label>
                        <input id="surnameF" name="surnameF" class="form-control" type="text">
                    </section>
                    
                    <section class="form-group">
                        <label for="phoneF">Telefón:</label>
                        <input id="phoneF" name="phoneF" class="form-control" type="text">
                    </section>
                    
                    <section class="form-group">
                        <label for="emailF">Email:</label>
                        <input id="emailF" name="emailF" class="form-control" type="email">
                    </section>
                    
                    <h4>Adresa</h4>
                    
                    <section class="form-group">
                        <label for="cityStateF">Mesto a krajina:</label>
                        <input id="cityStateF" name="cityStateF" class="form-control" type="text">
                    </section>

                    <section class="form-group">
                        <label for="addressF">Ulica a číslo:</label>
                        <input id="addressF" name="addressF" class="form-control" type="text">
                    </section>

                    <section class="form-group">
                        <label for="postalCodeF">PSČ:</label>
                        <input id="postalCodeF" name="postalCodeF" class="form-control" type="text">
                    </section>

                    <h3>Doprava</h3>
                    <hr>

                    <section>
                        <section class="form-check">
                            <input class="form-check-input" type="radio" name="transport" id="transport1" value="1" checked>
                            <label class="form-check-label" for="transport1">Poštou</label>
                        </section>

                        <section class="form-check">
                            <input class="form-check-input" type="radio" name="transport" id="transport2" value="2">
                            <label class="form-check-label" for="transport2">Poštovým kurierom</label>
                        </section>

                        <section class="form-check">
                            <input class="form-check-input" type="radio" name="transport" id="transport3" value="3">
                            <label class="form-check-label" for="transport3">Súkromným kurierom</label>
                        </section>

                    </section>
                    
                    <section class="payment">
                        <h3>Spôsob platby</h3>
                        <hr>
                        <section class="row">
                            <label class="radio col-md-2 col-6"><input type="radio" name="payment" id="pay1" value="1" checked>Dobierka</label>
                            <label class="radio col-md-2 col-6"><input type="radio" name="payment" id="pay1" value="2">Karta</label>
                            <label class="radio col-md-2 col-6"><input type="radio" name="payment" id="pay1" value="3">Prevod</label>
                            <label class="radio col-md-2 col-6"><input type="radio" name="payment" id="pay1" value="4">PayPal</label>
                            <label class="radio col-md-2 col-6"><input type="radio" name="payment" id="pay1" value="5">Kupón</label>
                        </section>
                        
                        <section class="order_info">
                            <h5>Cena nákupu:</h5>
                            <p>{{$total_p}}€</p>
                        </section>

                    </section>
                    
                    <hr>
                    <section class="form-group">
                        <label for="comment"><h5>Komentár k objednávke:</h5></label>
                        <textarea id="comment" class="form-control" rows="5" name="comment" placeholder="Toto je priestor pre Vás aby ste nám zanechali vaše dodatočné požiadavky..."></textarea>
                    </section>
                    <hr>
                    
                    <section class="checkbox">
                        <label><input type="checkbox" id="agree" value="" required>   Súhlasím s obchodnými podmienkami</label>
                    </section>

                    <section class="bottom_buttons">
                        <a href="/cart1" class="btn btn-secondary bt-lg" role="button">Späť</a>
                        <button type="submit" class="btn btn-info bt-lg float-md-right">Objednať s povinnosťou platby</button>
                    </section>

                </form>


            </article>
                    
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