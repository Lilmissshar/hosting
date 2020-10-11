@extends('layouts.admin.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-12 d-flex">
              <h4 class="text-center">Edit Destination</h4>
            </div>
          </div>
        </div>

        <div class="row card-body">
          <div class="col-md-10 col-sm-12 mx-auto">
            {!! Form::model($destination, ['route' => ['admin.destinations.update', $destination->id], 'method' => 'PUT', 'id' => 'FormValidation', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
              <div class="form-group has-label">
                <label>Destination Name
                  <label class="star">*</label>
                </label>
                {{ Form::text('name', null, [ 'class' => 'form-control', 'required' => 'true']) }}
              </div>
              <div class="form-group has-label">
                <label>Description
                  <label class="star">*</label>
                </label>
                {{ Form::text('description', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
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
                {{ Form::select('type', array('Activity' => 'Activity', 'Sight-see' => 'Sight Seeing', 'Accomodation' => 'Accomodation'), null, ['class' => 'form-control', 'required']) }}
              </div>
              <div class="form-group has-label">
                <label>Picture Name
                  <star class="star">*</star>
                </label>
                {{ Form::text('pictureName', null, [ 'class' => 'form-control']) }}
              </div>
              <div class="form-group has-label">
                <label>Uploads
                  <star class="star">*</star>
                </label><br>
                {{ Form::File('image', null, ['class' => 'form-control', 'required']) }}
              </div>
              <destinationcategory-component prop-categories="{{ $categories }}"></destinationcategory-component>
              <keyword-destination-component prop-keywords="{{ $keywords }}"></keyword-destination-component>
              <div class="card-footer ml-auto mr-auto mt-3 text-right">
                <button type="submit" class="btn btn-warning btn-wd">Save Edit</button>
              </div>
            {!! Form::close() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

