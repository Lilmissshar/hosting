@extends('layouts.admin.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-12 d-flex">
							<h4 class="text-center">Edit Museum Name</h4>
						</div>
					</div>
        </div>

        <div class="row card-body">
          <div class="col-md-10 col-sm-12 mx-auto">
            {!! Form::model($museum, ['route' => ['museums.update', $museum->id], 'method' => 'PUT', 'id' => 'FormValidation', 'enctype' => 'multipart/form-data']) !!}
              <div class="form-group has-label">
                <label>Museum Name
                  <label class="star">*</label>
                </label>
                {{ Form::text('museumName', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>

              <div class="form-group has-label">

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