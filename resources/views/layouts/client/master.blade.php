@extends('layouts.partials.client.meta')

@section('master')
  <div class="wrapper">
  	@include('layouts.partials.admin.notification')
	@yield('content')
  </div>
@endsection
