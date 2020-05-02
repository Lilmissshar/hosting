@extends('layouts.client.master')

@section('content')
	<div class="container">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 d-flex">
            <h4 class="text-center mr-auto my-1">Museum Feedback Form </h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'form.store', 'class' => 'form', 'id' => 'form-validation']) !!}
        <div class="form-group has-label">
          <label>Name
            <star class="star">*</star>
          </label>
          {{ Form::text('name', null, [ 'class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Email
            <star class="star">*</star>
          </label>
          {{ Form::text('email', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group has-label">
          <label>Mobile Number
            <star class="star">*</star>
          </label>
          {{ Form::text('mobile', null, [ 'class'=>'form-control', 'required']) }}
        </div>
        <forms-component></forms-component>
        <div class="form-group has-label">
          <label>Overall Rating
            <star class="star">*</star>
          </label>
          <div>
          <label>
          {{ Form::radio('overall_rating', 1, false, [ 'required']) }}
          1
        </label>
        <label>
          {{ Form::radio('overall_rating', 2, false, [ 'required']) }}
          2
        </label>
        <label>
          {{ Form::radio('overall_rating', 3, false, [ 'required']) }}
          3
        </label>
        <label>
          {{ Form::radio('overall_rating', 4, false, [ 'required']) }}
          4
        </label>
        <label>
          {{ Form::radio('overall_rating', 5, false, [ 'required']) }}
          5
        </label>
      </div>
        </div>
        <div class="form-group has-label">
          <label>Tour Guide Rating
            <star class="star">*</star>
          </label>
          <div>
          <label>
          {{ Form::radio('guide_rating', 1, false, [ 'required']) }}
          1
        </label>
        <label>
          {{ Form::radio('guide_rating', 2, false, [ 'required']) }}
          2
        </label>
        <label>
          {{ Form::radio('guide_rating', 3, false, [ 'required']) }}
          3
        </label>
        <label>
          {{ Form::radio('guide_rating', 4, false, [ 'required']) }}
          4
        </label>
        <label>
          {{ Form::radio('guide_rating', 5, false, [ 'required']) }}
          5
        </label>
      </div>
        </div>
        <div class="form-group has-label">
          <label>Improvements to be done
            <star class="star">*</star>
          </label>
          {{ Form::textarea('improvements', null, [ 'class'=>'form-control', 'required']) }}
        </div>
        <museums-component></museums-component>
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