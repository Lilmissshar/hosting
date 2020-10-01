@extends('layouts.client.master')

@section('content')

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section -->
<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-md-3 order-2 order-sm-1">
                    <div class="header__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
                    <a href="./index.html" class="site-logo">
                        <img src="img/logo2.png" alt="">
                    </a>
                </div>
                <div class="col-sm-4 col-md-3 order-1 order-sm-3">
                    <div class="header__switches">
                        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
                        <a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
                        <a href="#"><i class="fa fa-user-circle fa-7x"></i></a>
                    </div>
                </div>
            </div>
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="./index.html" class="menu--active">Home</a></li>
                    <li><a class="nav-link" href="{{ route('datepicker') }}">Recommendation</a></li>
                   <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                    {{--<li><a href="./blog.html">Blog</a>
                        <ul class="sub__menu">
                            <li><a href="./blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li><a href="./contact.html">Contact</a></li>--}}
                </ul>
            </nav>
        </div>
    </header>
    <!-- Header Section end -->

    <!-- Hero Section -->
   <section class="hero__section">
        <div class="hero-slider">
            <div class="slide-item">
                <a class="fresco" href="img/hero-slider/1.jpg" data-fresco-group="projects">
                    <img src="img/hero-slider/1.jpg" alt="">
                </a>
            </div>
            <div class="slide-item">
                <a class="fresco" href="img/hero-slider/2.jpg" data-fresco-group="projects">
                    <img src="img/hero-slider/2.jpg" alt="">
                    </a>
            </div>
            <div class="slide-item">
                <a class="fresco" href="img/hero-slider/3.jpg" data-fresco-group="projects">
                    <img src="img/hero-slider/3.jpg" alt="">
                </a>    
            </div>
            <div class="slide-item">
                <a class="fresco" href="img/hero-slider/4.jpg" data-fresco-group="projects">
                    <img src="img/hero-slider/4.jpg" alt="">
                </a>    
            </div>
            <div class="slide-item">
                <a class="fresco" href="img/hero-slider/5.jpg" data-fresco-group="projects">
                    <img src="img/hero-slider/5.jpg" alt="">
                </a>    
            </div>
            <div class="slide-item">
                <a class="fresco" href="img/hero-slider/6.jpg" data-fresco-group="projects">
                    <img src="img/hero-slider/6.jpg" alt="">
                </a>    
            </div>
            <div class="slide-item">
                <a class="fresco" href="img/hero-slider/7.jpg" data-fresco-group="projects">
                    <img src="img/hero-slider/7.jpg" alt="">
                </a>    
            </div>
        </div>
        <div class="hero-text-slider">
            <div class="text-item">
                <h2>City Center</h2>
                <p>Kuala Lumpur</p>
            </div>
            <div class="text-item">
                <h2>Emerald Seas</h2>
                <p>Beach getaway</p>
            </div>
            <div class="text-item">
                <h2>Rich culture</h2>
                <p>Batu Caves</p>
            </div>
            <div class="text-item">
                <h2>Muslim Culture</h2>
                <p>Mosque</p>
            </div>
            <div class="text-item">
                <h2>Island getaway</h2>
                <p>Sabah Borneo</p>
            </div>
            <div class="text-item">
                <h2>City</h2>
                <p>Malacca</p>
            </div>
            <div class="text-item">
                <h2>Night life</h2>
                <p>Kuala Lumpur</p>
            </div>
        </div>
    </section>
    <!-- Hero Section end -->

<section class="text_description">
	<div class="text">
		<center><h2>Tourism In Malaysia</h2></center>
		<br>
		<center>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et turpis lacus. Nulla facilisi. Sed et suscipit mi. Aliquam a ligula condimentum, mollis orci volutpat, faucibus orci. Mauris leo ex, venenatis vel iaculis vel, tristique quis dolor. In est lacus, tincidunt nec turpis eget, ultricies ornare est. Nulla vitae ullamcorper nisi, et euismod ex. Vestibulum ac sagittis sem, sit amet porttitor urna. Phasellus nec molestie felis, in ultrices mi. Integer ac laoreet sem. In consequat arcu condimentum aliquet tristique. Praesent sed justo nec quam pretium gravida ac nec ex. Phasellus pretium, urna at consequat scelerisque, risus libero rhoncus justo, ac molestie eros nisi eget ex. Duis gravida gravida magna, at gravida odio convallis nec.</p>

			<p>Phasellus ac ligula facilisis, viverra sapien sit amet, congue nunc. Fusce congue tristique augue, eget tincidunt nunc efficitur nec. Nam ullamcorper eu diam quis facilisis. Mauris elementum molestie eros, quis laoreet elit porta eu. Quisque et odio mauris. Sed convallis malesuada elit, ut rutrum orci luctus eget. Suspendisse dictum magna interdum, maximus tortor id, consectetur felis. Nullam aliquet lacus at ornare suscipit. Vestibulum a est mattis, facilisis mi vitae, mattis quam. Curabitur quis faucibus nisl, at interdum velit. Nulla varius tellus iaculis, tempus est eu, commodo libero. Integer porta diam sed eros feugiat, nec pellentesque urna condimentum. Duis sit amet orci arcu. Nunc euismod, nisl vitae semper vehicula, nulla purus sollicitudin tortor, vel sollicitudin leo dui et erat. Nunc at magna eu nulla posuere tempus.</p>
	</center>
	</div>
</section>


    <!-- Footer Section -->
    <footer class="footer__section">
        <div class="container">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <div class="footer__copyright__text">
                <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            </div>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- Footer Section end -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    

</html>

@endsection
