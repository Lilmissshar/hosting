@extends('layouts.admin.master')

@section('content')
<head>
<center><h3>Import Export Excel or CSV file</h3></center>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>

  <center><div class="panel-body">
    <a href="{{ url('admin/downloadExcelKeyword/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
    <a href="{{ url('admin/downloadExcelKeyword/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
    <a href="{{ url('admin/downloadExcelKeyword/csv') }}"><button class="btn btn-success">Download CSV</button></a>

    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('admin.keyword.importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <input type="file" name="import_file" />
        <button class="btn btn-primary">Import File</button>
    </form>

  </div></center>
  @endsection