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
 	<link rel="stylesheet" href="/css/all_products_styles.css">
 	<link rel="stylesheet" href="/css/multirange_styles.css">

	 <!------ Prvok 'multirange' použitý na ohraničenie ceny v bočnom filtri z https://projects.verou.me/multirange/ -->
	 <!--Obrázky použité v danej obrazovke boli prebraté z pixabay.com--> 

	<script src="/js/multirange.js"></script>
 	<script type="text/javascript" src="/js/all-scripts.js"></script>
 	
 	
 	<title>Fess Handry</title>
 </head>

 <body onload="cenaUpdate({{$price->min}},{{$price->max}});">

 	

 @endsection
 	
	
	
	 @section('content') 



 	<section class="container" id="main" >

	
	


 		<h1>Krásne šaty pre krásky najkrajšie</h1>

 		<section class="filters row">
 			<section class="col-8 left_filter">
 				
 				<button class="filter_button" onclick=radio_load() data-toggle="dropdown" id="sortDropdown" aria-haspopup="true" aria-expanded="false">
				 	<p class="d-inline">Zoradiť</p>
 					<span class="fil-type fa fa-sort-amount-asc"> </span>
 				</button>
 				
 				<div class="dropdown-menu radio" x-placement="bottom-start" data-flip="false" aria-labelledby="sortDropdown">
					 <label><input type="radio" value="price|asc" name="optradio" onclick="radio_redir(this.value,
					 '{{request()->fullUrlWithQuery(['order'=>'price','sort'=>'asc'])}}')">cena (0-9)</label>
					 <label><input type="radio" value="price|desc" name="optradio" onclick="radio_redir(this.value,
					 '{{request()->fullUrlWithQuery(['order'=>'price','sort'=>'desc'])}}')">cena (9-0)</label>
					 <label><input type="radio" value="created_at|asc" name="optradio" onclick="radio_redir(this.value,
					 '{{request()->fullUrlWithQuery(['order'=>'created_at','sort'=>'asc'])}}')">dátum pridania (nové)</label>
					 <label><input type="radio" value="created_at|desc" name="optradio" onclick="radio_redir(this.value,
					 '{{request()->fullUrlWithQuery(['order'=>'created_at','sort'=>'desc'])}}')">dátum pridania (staré)</label>
					 <label><input type="radio" value="name|asc" name="optradio" onclick="radio_redir(this.value,
					 '{{request()->fullUrlWithQuery(['order'=>'name','sort'=>'asc'])}}')">názov (A-Z)</label>
					 <label><input type="radio" value="name|desc" name="optradio" onclick="radio_redir(this.value,
					 '{{request()->fullUrlWithQuery(['order'=>'name','sort'=>'desc'])}}')">názov (Z-A)</label>
				</div>	

 				

 			</section>

 			<section class="col-4 right_filter">
 				<button class="filter_button" onclick="filter_load()">
				 <p class="d-inline">Filtrovať</p>
 					<span class="fa fa-filter"></span>
 				</button>

 			</section>
 				<!--- Sidenav filter inšpirovaný https://www.w3schools.com/howto/howto_js_sidenav.asp --->

 				<aside id="mySidenav" class="sidenav">
 					
 					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 				


 					<section>
						<div class="row filter">
							<button class="filter_toggle_button" id="sizeButton" onclick="showSizeFilter()">
								<label>Veľkosť</label>
							</button>
						</div>
						
						<div class="checkbox filter_content"  id="sizeFilter">
							<label><input type="checkbox" value='XXS' name="size_name">XXS</label>
							<label><input type="checkbox" value='XS' name="size_name">XS</label>
							<label><input type="checkbox" value='S' name="size_name">S</label>
							<label><input type="checkbox" value='M' name="size_name">M</label>
							<label><input type="checkbox" value='L' name="size_name">L</label>
							<label><input type="checkbox" value='XL' name="size_name">XL</label>
							<label><input type="checkbox" value='XXL' name="size_name">XXL</label>
						</div>
					 </section>

 					<section>
						<div class="row filter">
							<button class="filter_toggle_button" id="colorButton" onclick="showColorFilter()" >
								<label>Farba</label>
							</button>
						</div>
   
						<div class="checkbox filter_content"  id="colorFilter">
							@foreach($allcolors as $color)
							<label><input type="checkbox" value='{{$color->color_name}}' name="color_name" >{{$color->color_name}}</label>
							@endforeach
							{{---<label><input type="checkbox" name="color" checked>zelená</label>
							<label><input type="checkbox" name="color">žltá</label>
							<label><input type="checkbox" name="color">modrá</label>
							<label><input type="checkbox" name="color">červená</label>
							<label><input type="checkbox" name="color">čierna</label>
							<label><input type="checkbox" name="color">biela</label>
							<label><input type="checkbox" name="color">fialová</label>---}}
						</div>
					 </section>

 					<section>
						<div class="row filter">
							<button class="filter_toggle_button" id="colectionButton" onclick="showColectionFilter()" >
								<label>Kolekcia</label>
							</button>
						</div>
   
						<div class="checkbox filter_content"  id="colectionFilter">
							@foreach($allcollections as $collection)
							<label><input type="checkbox" value='{{$collection->collection}}' name="collection" >{{$collection->collection}}</label>
							@endforeach
							{{--<label><input type="checkbox" name="collection">SS 2019</label>
							<label><input type="checkbox" name="optradio">FW 2019/2020</label>
							<label><input type="checkbox" name="optradio">SS 2020</label>
							<label><input type="checkbox" name="optradio">FW 2020/2021</label>
							<label><input type="checkbox" name="optradio">essentials</label>
							<label><input type="checkbox" name="optradio">udržateľná móda</label>
							<label><input type="checkbox" name="optradio">vegan</label>--}}
						</div>
					 </section>

 					<section>
						<div class="row filter">
							<button class="filter_toggle_button" >
								<label>Cena od-do</label>
							</button>
							
						</div>
						<div class="row filter" id="sliderDiv" >
							<input type="range" id="slider" multiple value="0,100" onmousemove="cenaUpdate({{$price->min}},{{$price->max}})" />
   
						</div>
						<div class="row labels_cena">
							<div class="col " >
								<label id="labelOd">€</label>
							</div>
							<div class="col" >
								<label id="labelDo">€</label>
							</div>
						</div>
					</section>

 					<div class="row">
 						<div class="col text-center" >
 							<button class="resetFilterBtn resetbtn"  onclick="reset()">Reset</button>
 						</div>
 						<div class="col text-center" onclick="filter_to_query('{{url()->current()}}')" >
 							<button class="resetFilterBtn filterbtn" >Filtruj</button>
 						</div>
 					</div>
 				
 				</aside>
 			
 		</section>


 		<section class=row>
		 @foreach($produkty as $book)

  		 {{--<p> {{$book->name}}</p>--}}
		   <section class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 d-flex align-items-stretch">
				<div class="card h-100 w-100 ">

					<div class="view overlay">
						{{--<picture>
    						<source srcset="/img/red-dress-250.jpg"
            					media="(min-width: 1200px)">
            				<source srcset="/img/red-dress-200.jpg"
            					media="(min-width: 768px)">
            				<source srcset="/img/red-dress-250.jpg"
            					media="(min-width: 567px)">
            				<source srcset="/img/red-dress-500.jpg"
            					media="(min-width: 401px)">
            				<source srcset="/img/red-dress-250.jpg"
            					media="(max-width: 400px)">


   					 		<img src="/img/red-dress-500.jpg" width=100% alt="foto šiat" />

						</picture>--}}
						<img src={{$book->picture_path}} width=100% alt="foto šiat" />						
					</div>

					<div class="card-body text-left">
						
						<section class="mt-auto ">

						<p class="font-weight-bold">
						{{$book->price}}€
						</p>

						
							<h5 >
								<a href="{{route('productdetail', ['gender' => $book->sex,
																'category'=>$book->category,
																'id'=> $book->id])}}" class="stretched-link">
									<strong>{{$book->name}}</strong>
								</a>
							</h5>
						

							<div class="color_swatch align-items-left">
							
								@foreach(explode(',',$book->col) as $color)
								<span class="color_rect red" style="background-color:{{$color}};"></span>
								@endforeach
							
 								{{--<span class="color_rect red" ></span>
 								<span class="color_rect green" ></span>
 								<span class="color_rect pink" ></span>--}}
 							</div>
							 </section>
					</div>

					

				</div>

			</section>
	@endforeach


 			

 		<section class="row justify-content-center">
 			<div class="col load-more">
				{{$produkty->withQueryString()->links('pagination::bootstrap-4')}}
 				{{--<label  class="bottom" >Načítaných xy z xyz produktov</label>
 				<button class="btn-info bottom">Načítať ďalšie</button>--}}
 			</div>
 		</section>
 		

 	</section>

 	@endsection

@section('bottom')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

 </body>
 </html> 

 @endsection

