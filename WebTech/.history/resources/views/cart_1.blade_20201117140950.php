@extends('our_layouts.cart_layout')

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
        
