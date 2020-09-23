@extends('layouts.admin.master')


@section('content')
<div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar">
      </div>
      <table id="bootstrap-table" class="table" data-url="{{ route('admin.plans.index') }}">
        <thead>
          <th data-field="id" class="text-center" data-sortable="true">ID</th>
          <th data-field="name">Plan Name</th>
          <th data-field="user_id">User ID</th>
         </th>
        </thead>
      </table>
    </div>
  </div>
@endsection('content')

@section('scripts')
  <script type="text/javascript">
    function operateFormatter(value, row, index) {
      return [
        '<a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
        '<i class="fa fa-remove"></i>',
        '</a>', 
        '<a rel="tooltip" title="Edit" class="btn btn-link btn-danger table-action edit" href="javascript:void(0)">',
        '<i class="fa fa-edit"></i>',
        '</a>'
      ].join('');
    }
  </script>
@endsection