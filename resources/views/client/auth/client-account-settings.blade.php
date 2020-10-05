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
                        <a href="{{ route('client.account.show') }}"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
                    <a href="./index.html" class="site-logo">
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

	<div class="container">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 d-flex">
            <h4 class="text-center mr-auto my-1">Account Settings</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        {!! Form::model(current_user(), ['route' => ['client.account.update'], 'enctype' => 'multipart/form-data', 'class' => 'form', 'id' => 'account-settings-form']) !!}
        <div class="form-group has-label">
          <label>Profile Picture
            <star class="star">*</star>
          </label>
          <div class="d-flex">
						<img src="{{ avatar_picture_url(current_user()->avatar) }}" id="avatar-pic" class="border-gray img-thumbnail img-thumbnail-profile"><br>
						<div class="input-group mb-3">
						  <div class="custom-file">
								{{ Form::file('avatar', ['class' =>'custom-file-input on__file__change', 'id' => 'file-picker', 'data-target' => '#avatar-pic'])}}<br>
						    <label class="custom-file-label" for="file-picker">Choose file</label>
						  </div>
						</div>

          </div>
        </div>
        <div class="form-group has-label">
          <label>Name
            <star class="star">*</star>
          </label>
          {{ Form::text('name', current_user()->name, [ 'class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Email
            <star class="star">*</star>
          </label>
          {{ Form::text('email', current_user()->email, ['class' => 'form-control disabled', 'required', 'disabled']) }}
        </div>

        <div class="card-category form-category">
          <star class="star">*</star> Required fields
				</div>

        <div class="card-footer text-right">
          <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 d-flex">
            <h4 class="text-center mr-auto my-1">Change Password</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => ['client.password.change'], 'method' => 'PUT', 'class' => 'form', 'id' => 'change-password-form']) !!}
        <div class="form-group has-label">
          <label>Current Password
            <star class="star">*</star>
          </label>
          <input class="form-control" name="current_password" type="password" required="true" />
        </div>
        <div class="form-group has-label">
          <label>new password
            <star class="star">*</star>
          </label>
          <input class="form-control" name="password" type="password" required="true" />
        </div>
        <div class="form-group has-label">
          <label>Confirm Password
            <star class="star">*</star>
          </label>
          <input class="form-control" name="password_confirmation" type="password" required="true" />
        </div>

        <div class="card-category form-category">
          <star class="star">*</star> Required fields
				</div>

        <div class="card-footer text-right">
          <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
