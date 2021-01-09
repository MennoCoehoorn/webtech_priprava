<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/login_styles.css">
        <link rel="stylesheet" href="/css/main_styles.css">
        <link 
            href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
            rel="stylesheet"  type='text/css'>

        <script type="text/javascript" src="/js/all-scripts.js"></script>
        <title>Fess Handry</title>
    </head>
    <body>

        
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
                <div class="col d-none d-sm-inline-block">
                    <input id="searchInput" type="search" id="search" placeholder="Hľadajte..." />
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


                    <a class="header-icon" href="#">
                        <span class="fa fa-user" aria-hidden="true"></span>
                    </a>

                    <a class="header-icon" href="#">
                        <span class="fa fa-shopping-cart" aria-hidden="true"></span>
                    </a> 
                </div>
            </div>

            <div id="searchPop" class="row d-block d-sm-none">
                <input id="searchInput2" type="search" id="search" placeholder="Hľadajte..." />
            </div>
        </section>

    <section class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav ">
            <li class="dropdown" aria-hidden="true"><a data-toggle="dropdown" href="#">ŽENY 
                <span class="fa fa-caret-down"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Tričká</a></li>
                    <li><a href="#">Šaty</a></li>
                    <li><a href="#">Sukne</a></li>
                    <li><a href="#">Nohavice</a></li>
                </ul>
            </li>
            <li class="dropdown"><a data-toggle="dropdown" href="#">MUŽI 
                <span class="fa fa-caret-down"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Tričká</a></li>
                    <li><a href="#">Nohavice</a></li>
                </ul>
            </li>
        </ul>

    </section>



</nav>

@yield('content')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
    </body>
</html>