@extends('layouts.admin.master')

@section('content')
	<div class="container">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 d-flex">
            <h4 class="text-center mr-auto my-1">Add a new destination</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'admin.destinations.store', 'class' => 'form', 'id' => 'form-validation', 'files' => true]) !!}
        <div class="form-group has-label">
          <label>Destination Name
            <star class="star">*</star>
          </label>
          {{ Form::text('name', null, [ 'class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Description
            <star class="star">*</star>
          </label>
          {{ Form::textarea('description', null, ['class' => 'form-control', 'required']) }}
        </div>
         <div class="form-group has-label">
          <label>State
            <star class="star">*</star>
          </label>
          {{ Form::select('state', array('johor' => 'Johor', 'Kedah' => 'Kedah', 'Kelantan' => 'Kelantan', 'KL' => 'KL', 'Melaka' => 'Melaka', 'Pahang' => 'Pahang', 'Penang' => 'Penang', 'Perak' => 'Perak', 'Perlis' => 'Perlis', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak', 'Selangor' => 'Selangor', 'Terengganu' => 'Terengganu'), null, ['class' => 'form-control', 'required']) }}
        </div>
         <div class="form-group has-label">
          <label>Type
            <star class="star">*</star>
          </label>
          {{ Form::select('type', array('Cultural' => 'Cultural', 'Adventurous' => 'Adventurous', 'Food' => 'Food', 'Relaxation' => 'Relaxation', 'Shopping' => 'Shopping', 'SightSeeing' => 'SightSeeing'), null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Picture Name
            <star class="star">*</star>
          </label>
          {{ Form::text('pictureName', null, [ 'class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Uploads
            <star class="star">*</star>
          </label><br>
          {{ Form::File('image', null, ['class' => 'form-control', 'required']) }}
        </div>
        <destinationcategory-component></destinationcategory-component>
        <keyword-destination-component></keyword-destination-component>
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