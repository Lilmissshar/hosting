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
<div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar">
      </div>
      <table id="bootstrap-table" class="table table-striped">
        <thead class="thead-dark">
          <th>ID</th>
          <th>Name</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Destination</th>
          <th>Edit</th>
          <th>Review</th>
          <th>Add</th>
          <th>Delete</th>
        </thead>
        @foreach ($plans as $plan)
          <tr>
            <td>{{ $plans->firstItem() + $i++ }}</td>
            <td>{{ $plan['name'] }}</td>
            <td>{{ $plan['start_date'] }}</td>
            <td>{{ $plan['end_date'] }}</td>
            <td>{{ $plan['destinations'] }}</td>
            
            <td><a href="{{ route('plans.edit', $plan['id']) }}">Edit</a></td>
            @if ($plan['reviews'] != null)
            <td>{{ $plan['reviews'] }}</td>
            @else
             <td><a href="{{ route('reviews.index', $plan['id'])  }}">Add a review</a></td>
            @endif

            <td><a href="{{ route('editAdd', $plan['id']) }}">Add</a>
            <td><a href="{{ route('deletePlan', $plan['id']) }}">Delete</a>
          </tr> 
        @endforeach
      </table>
      <div class="d-flex">
        <div class="mx-auto">
          {{ $plans->links() }}
        </div>
    </div>
    </div>
  </div>
@endsection('content')
