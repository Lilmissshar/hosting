@extends('layouts.admin.master')


@section('content')

  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar">
      </div>
      <table id="bootstrap-table" class="table" data-url="{{ route('forms.index') }}">
        <thead>
          <th data-field="id" class="text-center" data-sortable="true">ID</th>
          <th data-field="name">Name</th>
          <th data-field="email">Email Address</th>
          <th data-field="mobile">Mobile</th>
          <th data-field="address">Address</th>
          <th data-field="overall_rating">Overall Rating</th>
          <th data-field="guide_rating">Guide Rating</th>
          <th data-field="improvements">Improvements</th>
          <th data-field="liked">Liked Museums</th>
          <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
        </thead>
      </table>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    function operateFormatter(value, row, index) {
      return [
        '<a rel="tooltip" title="View" class="btn btn-link btn-primary table-action view" href="javascript:void(0)">',
        '<i class="fa fa-money text-success"></i>',
        '</a>'
      ].join('');
    }
  </script>
@endsection
