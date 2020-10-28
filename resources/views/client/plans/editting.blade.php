
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
              @elseif (current_user()->role == 1)
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
                  <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                  <li><a class="menu--active" href="{{ route('datepicker') }}">Recommendation</a></li>
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
  <br><br>
  <!-- Header Section end -->
 <?php
$i = 0;
?>
  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar">
      </div>
      <table class="table">
    <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th>Day</th>
      <th>Dest</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
    @foreach ($planDest as $plan)
      <tr>
       
        <td>{{ $planDest->firstItem() + $i++ }}</td>
        <td>{{ $plan->day }}</td>
        <td>{{ \App\Destination::where(['id' => $plan->destination_id])->pluck('name')->first() }}</td>
        <td><a href="{{ route('editSpecifics', $plan->id) }}">Edit</a></td>
        <td><a href="">Delete</a></td>
        
        
      </tr> 
    @endforeach
  </table>
  <div class="d-flex">
        <div class="mx-auto">
          {{ $planDest->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection

