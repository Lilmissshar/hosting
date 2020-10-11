@extends('layouts.partials.client.meta')

@section('master')
  <div class="wrapper">
  	@include('layouts.partials.client.notification')
	@yield('content')
  </div>
@endsection

