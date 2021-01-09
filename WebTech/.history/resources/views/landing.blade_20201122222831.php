@extends('our_layouts.nav_footer')

@section('header')

<!DOCTYPE html>
 <html>
 <head>
 	<title>Fess Handry</title>
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 	<link 
 	href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
 	rel="stylesheet"  type='text/css'>
 	<link rel="stylesheet" href="/css/main_styles.css">
 	<link rel="stylesheet" href="/css/landing_styles.css">
	 <script type="text/javascript" src="/js/all-scripts.js"></script>
	 
	 <!--Obrázky použité v danej obrazovke boli prebraté z pixabay.com-->
 	

 </head>

 <body>

 	
@endsection
 	
	
	
@section('content')
<section class="container">

	<section class="jumbotron">
		<div class=row>
			<div class="col-md-5 align-self-center">
				<h1>Najlepšie oblečenie pre lokálnych trendsetterov</h1>
			</div>
			<div class=col-md-7>
				<picture>
    				<source srcset="/img/store-1200.jpg"
            				media="(min-width: 1200px)">
            		<source srcset="/img/store-500.jpg"
            				media="(max-width: 767px)">
            		<source srcset="/img/store-500.jpg"
            				media="(min-width: 992px)">
            		<source srcset="/img/store-350.jpg"
            				media="(min-width: 768px)">
            		<source srcset="/img/store-350.jpg"
            				media="(max-width: 400px)">
   					 <img src="/img/store-1200.jpg" width=100% alt="foto predajne" />
				</picture>
			</div>
		</div>

	</section>

	<article>

		<section class="well">
			<h2 class="text-divider text-center">Mohlo by Vás zaujať</h2>
		</section>


		<section class=row>
		@foreach($produkty as $prod)
		 @if ($loop->index==3)
		 <section class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 d-md-none d-lg-flex d-flex align-items-stretch">
			
			@else
			<section class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 d-flex align-items-stretch">
			@endif
				<div class="card align-items-center">

					<div class="view overlay">
						<picture>
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
   					 		<img src="/img/red-dress-500.jpg" width=100% alt="foto predajne" />
						</picture>
						
					</div>

					<div class="card-body text-center">
						<a href="/allproducts/{{strtolower($prod->sex)}}/{{$prod->category}}">
							<h6>{{mb_strtoupper($prod->category,'UTF-8')}}</h6>
						</a>
						
						<a href="/allproducts/{{strtolower($prod->sex)}}/{{$prod->category}}/{{$prod->id}}" >
							<h5 >
								<strong>{{$prod->name}}</strong>
							</h5>
						</a>

						<p class="font-weight-bold">
						{{$prod->price}}€
						</p>
					</div>

				</div>

			</section>
			@endforeach

			

			<section class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 d-md-none d-lg-flex d-flex align-items-stretch">
				<div class="card align-items-center">

					<div class="view overlay">
						<picture>
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
   					 		<img src="/img/red-dress-500.jpg" width=100% alt="foto predajne" />
						</picture>
						
					</div>

					<div class="card-body text-center">
						<a href="">
							<h6>Šaty</h6>
						</a>
						
						<a href="" >
							<h5 >
								<strong>Krátke Šatyyyyyyyyy</strong>
							</h5>
						</a>

						<p class="font-weight-bold">
							125€
						</p>
					</div>

				</div>

			</section>


		</section>
	</article>

	<article>

		<section class="well">
			<h2 class="text-divider text-center">Iní kúpili</h2>
		</section>

		<section class=row>

		@foreach($produkty2 as $prod)
		 @if ($loop->index==3)
		 <section class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 d-md-none d-lg-flex d-flex align-items-stretch">
			
			@else
			<section class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 d-flex align-items-stretch">
			@endif
				<div class="card align-items-center">

					<div class="view overlay">
						<picture>
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
   					 		<img src="/img/red-dress-500.jpg" width=100% />
						</picture>
						
					</div>

					<div class="card-body text-center">
						<a href="/allproducts/{{strtolower($prod->sex)}}/{{$prod->category}}">
							<h6>{{mb_strtoupper($prod->category,'UTF-8')}}</h6>
						</a>
						
						<a href="/allproducts/{{strtolower($prod->sex)}}/{{$prod->category}}/{{$prod->id}}" >
							<h5 >
								<strong>{{$prod->name}}</strong>
							</h5>
						</a>

						<p class="font-weight-bold">
						{{$prod->price}}€
						</p>
					</div>

				</div>

			</section>
			@endforeach
			

			

		</section>
	</article>




</section>

@endsection

@section('bottom')


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html> 

@endsection