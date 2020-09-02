<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Sharon's FYP</title>
    <meta charset="UTF-8">
    <meta name="description" content="FYP">
    <meta name="keywords" content="photo, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/client/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/client/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/client/slicknav.min.css"/>
    <link rel="stylesheet" href="css/client/fresco.css"/>
    <link rel="stylesheet" href="css/client/slick.css"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/client/style.css"/>


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
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
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
                <div class="col-sm-4 col-md-3 order-3 order-sm-3">
                    <div class="header__switches">
                        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
                        <a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="./index.html" class="menu--active">Home</a></li>
                    <li><a href="./about.html">About</a></li>
                    <li><a href="./gallery.html">Gallery</a></li>
                    <li><a href="./blog.html">Blog</a>
                        <ul class="sub__menu">
                            <li><a href="./blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li><a href="./contact.html">Contact</a></li>
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

    <!--====== Javascripts & Jquery ======-->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/fresco.min.js"></script>
    <script src="js/main.js"></script>

    </body>
</html>