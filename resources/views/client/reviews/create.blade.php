@extends('layouts.client.master')

@section('content')

 <?php
$i = 0;
?>

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
                    <a href="{{ route('home') }}" class="site-logo">
                        <img src="img/logo2.png" alt="">
                    </a>
                </div>
                @if(!current_user())
                <div class="col-sm-4 col-md-3 order-1 order-sm-3">
                    <div class="header__switches">
                        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
                        <a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
                        <a href="{{ route('client.login.show') }}"><i class="fa fa-user-circle fa-7x"></i></a>
                    </div>
                </div>
                @elseif (current_user()->id == '1')
                <div class="col-sm-4 col-md-3 order-1 order-sm-3">
                    <div class="header__switches">
                        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
                        <a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
                        <a href="{{ route('client.login.show') }}"><i class="fa fa-user-circle fa-7x"></i></a>
                    </div>
                </div>
                @else
                <div class="col-sm-4 col-md-3 order-1 order-sm-3">
                    <div class="header__switches">
                        <a href="{{ route('plans.index') }}"><i class="fa fa-tasks"></i> Your saved plans</a>
                        <a class="nav-link" href="{{route('client.account.show')}}">
                          <i class="fa fa-cog"></i> Settings
                        </a>
                        <a href="{{ route('client.logout') }}" class="nav-link" style="color:red;">
                          <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </div>
                </div>
                @endif
            </div>
            <nav class="main__menu">
                <ul class="nav__menu">
                    <li><a href="{{ route('home') }}" class="menu--active">Home</a></li>
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

<div class="col-md-4 col-sm-6 ml-auto mr-auto">
    {!! Form::model($review, ['route' => ['reviews.store', $review->id], 'id' => 'form-validation', 'class' => 'form form__submit']) !!}
      <div class="card card-login card-hidden">
        <div class="card-header">
          <h4 class="header text-center">Review Form</h4>
        </div>
        <div class="card-body ">
          <div class="form-group has-label">
            <label>How was your overall experience?
              <star class="star">*</star>
            </label>
            {{ Form::radio('review', '5', true, ['id' => 'form-validation', 'class' => 'form-control', 'required' => true]) }}
          </div>
          <div class="card-category form-category">
            <star class="star">*</star> Required fields
          </div>
        </div>
        <div class="registerButton text-center">
          <button type="submit" class="btn btn-wd btn-primary">Send</button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
@endsection('content')
