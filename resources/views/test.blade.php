@extends('layouts.client.master') 

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
                        <a href="#"><i class="fa fa-user-circle"></i></a>
                    </div>
                </div>
            </div>
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ 'home' }}" class="nav-link">Home</a></li>
                    <li><a class="nav-link" href="{{ route('datepicker') }}">Recommendation</a></li>
                   <li><a class="menu--active" href="{{ route('gallery') }}">Gallery</a></li>
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
<body>

<div class="container">
  <div class="row">
        <div id="filter-panel" class="collapse filter-panel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-perpage">Rows per page:</label>
                            <select id="pref-perpage" class="form-control">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option selected="selected" value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                            </select>                                
                        </div> <!-- form group [rows] -->
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-search">Search:</label>
                            <input type="text" class="form-control input-sm" id="pref-search">
                        </div><!-- form group [search] -->
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-orderby">Order by:</label>
                            <select id="pref-orderby" class="form-control">
                                <option>Descendent</option>
                            </select>                                
                        </div> <!-- form group [order by] --> 
                        <div class="form-group">    
                            <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                                <label><input type="checkbox"> Remember parameters</label>
                            </div>
                            <button type="submit" class="btn btn-default filter-col">
                                <span class="glyphicon glyphicon-record"></span> Save Settings
                            </button>  
                        </div>
                    </form>
                </div>
            </div>
        </div> 
        </div>   
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#filter-panel">
            <span class="glyphicon glyphicon-cog"></span> Advanced Search
        </button>
  </div>
</div>

<!-- About Page -->
  <div class="gallery__page">
    <div class="gallery__warp">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/1.jpg" data-fresco-group="gallery">
            <img src="img/gallery/1.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/2.jpg" data-fresco-group="gallery">
            <img src="img/gallery/2.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/3.jpg" data-fresco-group="gallery">
            <img src="img/gallery/3.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/4.jpg" data-fresco-group="gallery">
            <img src="img/gallery/4.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/5.jpg" data-fresco-group="gallery">
            <img src="img/gallery/5.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/6.jpg" data-fresco-group="gallery">
            <img src="img/gallery/6.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/7.jpg" data-fresco-group="gallery">
            <img src="img/gallery/7.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/8.jpg" data-fresco-group="gallery">
            <img src="img/gallery/8.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/9.jpg" data-fresco-group="gallery">
            <img src="img/gallery/9.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/10.jpg" data-fresco-group="gallery">
            <img src="img/gallery/10.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/11.jpg" data-fresco-group="gallery">
            <img src="img/gallery/11.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="img/gallery/12.jpg" data-fresco-group="gallery">
            <img src="img/gallery/12.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- About Page end -->
</body>
@endsection
