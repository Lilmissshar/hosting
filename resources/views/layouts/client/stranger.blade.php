@extends('layouts.partials.admin.meta')

@section('master')
  <div class="wrapper wrapper-full-page">
    @include('layouts.partials.client.stranger-nav')
    <div class="full-page section-image" data-image="{{ asset('images/full_screen_bg2.jpg') }}">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="content pt-10vh">
        <div class="container">
					@include('layouts.partials.admin.notification')
          @yield('content')
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $page = $('.full-page');
      image_src = $page.data('image');

      if (image_src !== undefined) {
        image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
        $page.append(image_container);
      }

      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
@endsection
