@extends('layouts.client.master') 

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <a href="{{ route('plans.index') }}"><i class="fa fa-tasks"></i> Plans</a>
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
        @if(!current_user())
        <nav class="main__menu">
            <ul class="nav__menu">
                <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
               <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
               <li><a class="nav-link" href="{{ route('dests.index') }}">Add a destination</a></li>
            </ul>
        </nav>
        @elseif (current_user()->id == '1')
        <nav class="main__menu">
            <ul class="nav__menu">
                <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
               <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
               <li><a class="nav-link" href="{{ route('dests.index') }}">Add a destination</a></li>
            </ul>
        </nav>
        @else
        <nav class="main__menu">
            <ul class="nav__menu">
                <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li><a class="nav-link" href="{{ route('datepicker') }}">Recommendation</a></li>
               <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
               <li><a class="nav-link" href="{{ route('dests.index') }}">Add a destination</a></li>
            </ul>
        </nav>
        @endif
    </div>
</header>
<!-- Header Section end -->

<body>

<div class="container">
   <div class="row">
     <div class="col-sm-2">
       <label>Wanna apply a filter?</label><br><br>
    {!! Form::open(['route' => 'filterEditSpecifics', 'class' => 'form', 'id' => 'form-validation']) !!}
    <div class="form-group has-label">
      <label>State
        <star class="star">*</star>
      </label>
      {{ Form::select('state', array('johor' => 'Johor', 'Kedah' => 'Kedah', 'Kelantan' => 'Kelantan', 'KL' => 'KL', 'Melaka' => 'Melaka', 'Pahang' => 'Pahang', 'Penang' => 'Penang', 'Perak' => 'Perak', 'Perlis' => 'Perlis', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak', 'Selangor' => 'Selangor', 'Terengganu' => 'Terengganu'), null, ['class' =>  'required']) }}
    </div>
     <div class="form-group has-label">
      <label>Type
        <star class="star">*</star>
      </label>
      {{ Form::select('type', array('None' => 'None', 'Cultural' => 'Cultural', 'Adventurous' => 'Adventurous', 'Food' => 'Food', 'Relaxation' => 'Relaxation', 'Shopping' => 'Shopping', 'SightSeeing' => 'SightSeeing'), null, ['class' => 'required']) }}
    </div>
    
      <button type="submit" class="btn btn-info btn-fill btn-wd">Apply filter</button>
    

  {!! Form::close() !!}
     </div>
     <!-- /.col-sm-6 -->
     <div class="col-sm-10">
      <div class="container">
  <h2>This is your current trip itinerary</h2>
  <p>Click on the panel to open and close it.</p>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Trip Itinerary</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
          @foreach($plan as $p)
          Day: {{$p->day}} &nbsp
          Name: {{ \App\Destination::where(['id' => $p->destination_id])->pluck('name')->first()}}<br>
       @endforeach
        </div>
        <div class="panel-footer">Panel Footer</div>
      </div>
    </div>
  </div>
</div>
     </div>
     <!-- /.col-sm-6 -->
   </div>
   <!-- /.row -->
  </div>
  <!-- /.container -->

   {!! Form::open(['route' => 'chosen', 'class' => 'form', 'id' => 'form-validation']) !!}
  <div class="gallery__page">
    <div class="gallery__warp">
      <div class="row">
        @foreach($choices as $destination)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="gallery__item fresco" href="{{ asset('images/destinations/' . $destination->picture) }}" data-fresco-group="gallery">
            <img src="{{ asset('images/destinations/' . $destination->picture) }}" alt="image" width="500" height="375">
            Name: {{ $destination->name }}<br>
            Description: {{ $destination->description}}
          </a>
          {{ Form::radio('destination', $destination->id, true)}}
          {{--<input class="single-checkbox" type="checkbox" name="destination[]" value="{{ $destination->id }}">--}}
        </div>
        @endforeach
      </div>
      <div class="card-footer text-right">
          <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</body>

@endsection


