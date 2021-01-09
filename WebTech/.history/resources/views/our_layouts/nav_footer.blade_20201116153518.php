@yield('header')

<nav class="navbar navbar-inverse fixed-top align-items-start">
 		<section class="navbar-header">
 			<a class="header-icon" href="#">
 				<span class="fa fa-apple" aria-hidden="true"></span>
 			</a>

 			<button class="navbar-toggler header-icon" type="button" data-toggle="collapse" data-target="#myNavbar" 
 			aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
 			<span class="fa fa-bars" aria-hidden="true"></span>

 		</button>




 	</section>

	 	<section class="navbar-nav navbar-right">
	 		<div class="row justify-content-end">
			 <form action="/search" method="POST">
	 			<div class="col d-none d-sm-inline-block">
	 				<input id="searchInput" type="search" name="query" id="search" placeholder="Hľadajte..." />
	 			</div>

	 			<div class="col-xs-10">

	 				<a id="searchIcon" onclick="showSearchPop()" class="header-icon d-inline-block d-sm-none" 
	 					href="#">
	 					<span class="fa fa-search" aria-hidden="true"></span>
	 				</a>

	 				<a id="searchIcon" onclick="showSearch()" class="header-icon d-none d-sm-inline-block" 
	 					href="#">
	 					<span class="fa fa-search" aria-hidden="true"></span>
	 				</a>

					<button class="btn-primary" id="searchSend" type="submit" visible="false">Hľadať</button>

	 				<a class="header-icon" href="#">
	 					<span class="fa fa-user" aria-hidden="true"></span>
	 				</a>

	 				<a class="header-icon" href="#">
	 					<span class="fa fa-shopping-cart" aria-hidden="true"></span>
	 				</a> 
	 			</div>
			</div>

	 		<div id="searchPop" class="row d-block d-sm-none">
	 			<input id="searchInput2" type="search" name="query2" id="search" placeholder="Hľadajte..." />
	 		</div>
			 </form>
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