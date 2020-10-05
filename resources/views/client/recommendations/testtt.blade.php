@extends('layouts.client.master')

@section('content')
{{ $start }}
<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 d-flex">
          <h4 class="text-center">Destination</h4>
        </div>
      </div>
    </div>
      <div class="row card-body">
        <div class="col-md-10 col-sm-12 mx-auto">
          <p align='center'>
          <table style="width:100%">
            @foreach($destinations as $destination)
            <tr>
              <th>Destination Name</th>
              <td>{{$destination->name}}</td>
            </tr>
            <tr>
              <th>Destination Description</th>
              <td>{{$destination->description}}</td>
            </tr>
            <tr>
              <th>Destination Description</th>
              <td>{{$destination->picture}}</td>
            </tr>
            <tr>
              <th>Destination Picture</th>
              <td><img src="{{ asset('images/destinations/' . $destination->picture) }}" alt="Image"></td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection