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
        {!! Form::open(['route' => 'admin.destinations.store', 'class' => 'form', 'id' => 'form-validation']) !!}
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
          {{ Form::select('state', array('Perak' => 'Perak', 'Penang' => 'Penang', 'KL' => 'Kuala Lumpur'), null, ['class' => 'form-control', 'required']) }}
        </div>
         <div class="form-group has-label">
          <label>Type
            <star class="star">*</star>
          </label>
          {{ Form::select('type', array('Activity' => 'Activity', 'Sight-see' => 'Sight Seeing', 'Accomodation' => 'Accomodation'), null, ['class' => 'form-control', 'required']) }}
        </div>
        <destinationcategory-component></destinationcategory-component>
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
