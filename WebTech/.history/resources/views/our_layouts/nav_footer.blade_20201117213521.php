@yield('header')

<nav class="navbar navbar-inverse fixed-top align-items-start">
 		<section class="navbar-header">
 			<a class="header-icon" href="/landing">
 				<span class="fa fa-apple" aria-hidden="true"></span>
 			</a>

 			<button class="navbar-toggler header-icon" type="button" data-toggle="collapse" data-target="#myNavbar" 
 			aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
 			<span class="fa fa-bars" aria-hidden="true"></span>

 		</button>




 		</section>

	 	<section class="navbar-nav navbar-right">
	 		<div class="row justify-content-end">
	 			<div class="search col text-right d-none d-sm-inline-block">
				 	<form action="/search" method="GET">
					 @csrf
	 				<input  id="searchInput" type="input" id="search" name="query" placeholder="Hľadajte..." />
					 <button  id="searchBtn"class="btn-primary" type="submit">Hľadať</button>
					</form>
	 			</div>

	 			<div class="col-xs-10 col-sm-2">

	 				<button id="searchIcon" onclick="showSearchPop()" class="header-icon d-inline-block d-sm-none" 
	 					>
	 					<span class="fa fa-search" aria-hidden="true"></span>
	 				</button>

	 				<button id="searchIcon" onclick="showSearch()" class="header-icon d-none d-sm-inline-block" 
	 					>
	 					<span class="fa fa-search" aria-hidden="true"></span>
	 				</button>


	 				<a class="header-icon" href="/home">
	 					<span class="fa fa-user" aria-hidden="true"></span>
	 				</a>

	 				<a class="header-icon" href="/cart1">
	 					<span class="fa fa-shopping-cart" aria-hidden="true"></span>
	 				</a> 
	 			</div>
			</div>

			<div id="searchPop" class="row d-block d-sm-none">
			 	<form action="/search" method="GET">
					 @csrf
	 			<input class="col-11" id="searchInput2" type="input" name="query" id="search" placeholder="Hľadajte..." />
				<button class="col-1" id="searchBtn2"class="btn-primary" type="submit" hidden><span class="fa fa-arrow-right"></span></button>
					</form>
	 		</div>

	 		
		</section>

		

	<section class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav ">
			<li class="dropdown" aria-hidden="true"><a data-toggle="dropdown" href="">ŽENY 
				<span class="fa fa-caret-down"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{{route('allproducts', ['gender' => 'f','category'=>'tričko'])}}">Tričká</a></li>
					<li><a href="{{route('allproducts', ['gender' => 'f','category'=>'šaty'])}}">Šaty</a></li>
					<li><a href="{{route('allproducts', ['gender' => 'f','category'=>'sukna'])}}">Sukne</a></li>
					<li><a href="{{route('allproducts', ['gender' => 'f','category'=>'nohavice'])}}">Nohavice</a></li>
				</ul>
			</li>
			<li class="dropdown"><a data-toggle="dropdown" href="">MUŽI 
				<span class="fa fa-caret-down"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{{route('allproducts', ['gender' => 'm','category'=>'tričko'])}}">Tričká</a></li>
					<li><a href="{{route('allproducts', ['gender' => 'm','category'=>'nohavice'])}}">Nohavice</a></li>
				</ul>
			</li>
		</ul>

	</section>



</nav> 

@yield('content')

<footer class="page-footer font-small">
	<div class="container">

		<div class="row">

			<section class="col" id="footerLinks">

				<ul class="footer_links">
					<li class="footer_link">
						<a class="help" href="#">
							Pomoc a podpora
						</a>
					</li>
					<li class="footer_link">
						<a class="faq" href="#">
							FAQ
						</a>
					</li>
					<li class="footer_link">
						<a class="vop" href="#">
							Obchodné podmienky
						</a>
					</li>
					<li class="footer_link">
						<a class="doprava" href="#">
							Doprava a platba
						</a>
					</li>

				</ul>

			</section>

			<section class="col">
				<div class="socials">
					<a class="social_ic">
						<span class="fa fa-facebook-f"> </span>
					</a>
					<a class="social_ic">
						<span class="fa fa-twitter"> </span>
					</a>
					<a class="social_ic">
						<span class="fa fa-tumblr"> </span>
					</a>
					<a class="social_ic">
						<span class="fa fa-instagram"> </span>
					</a>

				</div>
			</section>
		</div>

		<section class="row">
			<div class="col">

				<div class="footer-copyright text-center py-3">© 2020 Copyright:
					<a href="https://mdbootstrap.com/"> Mareček&Ninuška</a>
				</div>
			</div>

		</section>

	</div>

</footer>

@yield('bottom')