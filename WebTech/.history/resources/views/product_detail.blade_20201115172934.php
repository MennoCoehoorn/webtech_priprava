
@extends('our_layouts.nav_footer')

@section('header')
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link 
	href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
	rel="stylesheet"  type='text/css'>
	<link rel="stylesheet" href="/css/main_styles.css">
	<link rel="stylesheet" href="/css/detail_styles.css">
	
	<script type="text/javascript" src="/js/all-scripts.js"></script>

	<!--Obrázky použité v danej obrazovke boli prebraté z pixabay.com-->
	
	<title>Fess Handry</title>
</head>


<body>

	

@endsection
 	
	
	
	 @section('content')

	<article class="container" id="main">
		<section>
			<div class="row">
				<a href="{{url()->previous()}}"><span class="fa fa-arrow-left"></span> Návrat do kategórie</a>
			</div>
			<div class="row product_name">
				<h2 class="responsive">{{$product->name}}</h2>
			</div>
		</section>

		<section class="row">
			<section class="col-md-8 col-12">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@for ($i=0;$i<(count($pictures));$i++)
						@if ($i==0)
						<li data-target="#carouselExampleIndicators" data-slide-to=$i class="active"></li>
						@else
						<li data-target="#carouselExampleIndicators" data-slide-to=$i></li>
						@endif
						@endfor
					
					</ol>
					<div class="carousel-inner">
						@foreach ($pictures as $pic)
						@if ($loop->first)
							<div class="carousel-item active">
						@else
							<div class="carousel-item">
						@endif	
   					 			<img class="car-img" src={{$pic->picture_path}} alt="" />
						
							</div>
						@endforeach
						{{--<div class="carousel-item active">
							<picture>
    						<source srcset="/img/dress red 300.jpg"
            					media="(max-width: 400px)">
            				<source srcset="/img/dress red 400.jpg"
            					media="(min-width: 401px)">
            				<source srcset="/img/dress red 500.jpg"
            					media="(min-width: 992px)">
            				
   					 		<img class="car-img" src="/img/dress red 500.jpg" alt="foto červených šiat" />
						</picture>
						</div>
						<div class="carousel-item">
							<picture>
    						<source srcset="/img/dress pink 300.jpg"
            					media="(max-width: 400px)">
            				<source srcset="/img/dress pink 400.jpg"
            					media="(min-width: 401px)">
            				<source srcset="/img/dress pink 500.jpg"
            					media="(min-width: 992px)">
            				
   					 		<img class="car-img" src="/img/dress pink 500.jpg" alt="foto ružových šiat" />
						</picture>
						
						</div>
						<div class="carousel-item">
							<picture>
    						<source srcset="/img/green dress 300.jpg"
            					media="(max-width: 400px)">
            				<source srcset="/img/green dress 400.jpg"
            					media="(min-width: 401px)">
            				<source srcset="/img/green dress 500.jpg"
            					media="(min-width: 992px)">
            				
   					 		<img class="car-img" src="/img/green dress 500.jpg" alt="foto zelených šiat" />
						</picture>
						</div>

						--}}
					</div>
					<a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon carousel_button" aria-hidden="true">
							<span class="fa fa-arrow-left"></span>
						</span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon carousel_button" aria-hidden="true">
							<span class="fa fa-arrow-right"></span>
						</span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</section>

			<section class="col-12 col-md-4 product-sel">
				<div class="row">
					<h3>{{$product->price}}€</h3>
				</div>
				<div class="row">
					<button class="btn-info size_button " data-toggle="dropdown" id="sizeDropdown" aria-haspopup="true" aria-expanded="false">
						<div class="row">
							<div class="col-9" >
								<label id="sizeLabel">Výber veľkosti</label>
							</div>
							<div class="col-3">
								<span class="fa fa-caret-down"></span>
							</div>

						</div>

					</button>

					<div class="dropdown-menu radio" x-placement="bottom-start" data-flip="false" aria-labelledby="sizeDropdown" onclick='size_picked(<?php echo $stock?>)'>
						
						@foreach($sizes as $size)
						<label><input type="radio" name="size" value="{{$size->size_name}}">{{$size->size_name}}</label>
						@endforeach
						{{--<label><input type="radio" name="optradio" value="XXS" checked>XXS</label>
						<label><input type="radio" name="optradio" value="XS">XS</label>
						<label><input type="radio" name="optradio" value="S">S</label>
						<label><input type="radio" name="optradio" value="M">M</label>
						<label><input type="radio" name="optradio" value="L">L</label>
						<label><input type="radio" name="optradio" value="XL">XL</label>
						<label><input type="radio" name="optradio" value="XXL">XXL</label>--}}
					</div>
				</div>

				<div class="row">
					<ul class="color_picker">
					@foreach ($colors as $color)
					<li>
							<input id="farba{{$color->color_name}}" value="{{$color->color_code}}" 
							class="hidden-radio" type="radio" name="color" onclick='check_stock(<?php echo $stock ?>)'>
							<label for="farba{{$color->color_name}}" title="{{$color->color_name}}"><span class="color" 
							style="background-color:{{$color->color_code}}"></span></label>
					</li>
					@endforeach
						{{--<li>
							<input id="farba1" class="hidden-radio" type="radio" name="optradio">
							<label for="farba1" title="červená"><span class="color color-red" ></span></label>
						</li>
						<li>
							<input id="farba2" class="hidden-radio" type="radio" name="optradio">
							<label for="farba2" title="modrá"><span class="color color-pink"></span></label>
						</li>
						<li>
							<input id="farba3"class="hidden-radio" type="radio" name="optradio">
							<label for="farba3" title="zelená"><span class="color color-green" ></span></label>
						</li>--}}
					</ul>

				</div>

				<div class="row">
					<p id='show_stock'>Skladom:</p>
				</div>

				<div class="row">
					<button class="quantity_button" onclick="quantity(-1)" id="minus" aria-hidden="true"><span class="fa fa-minus"></span></button>
					<input class="quantity_input" id="input" type="number" min="1" value="1">
					<button class="quantity_button" onclick="quantity(1)" id="plus" aria-hidden="true"><span class="fa fa-plus"></span></button>
				</div>

				<div class="row">
				<form action="{{ route('cart.add',[ 'id'=> $product->id,
													'size'=> {{<script> sizeValue() </script>}}, 
													'color'=>{{<script> colorValue() </script>}},
													'session'=>'0']) }}" method="POST">
                    <button class="btn-info cart_add" disabled=true>Vyberte veľkosť a farbu</button>
                </form>
					
				</div>

			</section>



		</section>
		<section class="description-tabs">
			
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Popis</a>
				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Zloženie</a>
			</div>
			
			<section class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<p>
						{{$product->description}}
					</p>
				</div>
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<ul>
						<li>{{$product->material}}</li>
					</ul>
				</div>
				
			</section>
		</section>
	</article>

	@endsection

@section('bottom')



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html> 

@endsection

