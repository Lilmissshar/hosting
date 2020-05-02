@extends('layouts.admin.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-12 d-flex">
							<h4 class="text-center">Feedback Form</h4>
						</div>
					</div>
        </div>
          <div class="row card-body">
            <div class="col-md-10 col-sm-12 mx-auto">
              <div class="form-group has-label">
                <label>Name
                  <label class="star">*</label>
                </label>
                {{ Form::text('name', $form->name, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true' ]) }}
              </div>

              <div class="form-group has-label">
                <label>Email
                  <label class="star">*</label>
                </label>
                {{ Form::text('email', $form->email, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true']) }}
              </div>

              <div class="form-group has-label">
                <label>Mobile
                  <label class="star">*</label>
                </label>
                {{ Form::text('mobile', $form->mobile, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true']) }}
              </div>

              <div class="form-group has-label">
                <label>Address
                  <label class="star">*</label>
                </label>
                @foreach($addresses as $address)
                {{ Form::text('address', $address->name, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true']) }}
                @endforeach
              </div>

              <div class="form-group has-label">
                <label>Overall Rating
                  <label class="star">*</label>
                </label>
                {{ Form::text('overall_rating', $form->overall_rating, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true']) }}
              </div>

              <div class="form-group has-label">
                <label>Guide Rating
                  <label class="star">*</label>
                </label>
                {{ Form::text('guide_rating', $form->guide_rating, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true']) }}
              </div>

              <div class="form-group has-label">
                <label>Improvements
                  <label class="star">*</label>
                </label>
                {{ Form::text('improvements', $form->improvements, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true']) }}
              </div>

              <div class="form-group has-label">
                <label>Liked museums
                  <label class="star">*</label>
                </label>
                @foreach($museums as $museum)
                {{ Form::text('museum', $museum->museumName, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true', 'disabled' => 'true']) }}
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection