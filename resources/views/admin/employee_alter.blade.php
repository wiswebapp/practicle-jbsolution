@extends('adminlte::page')

@section('title', 'Employee Listing')

@section('content_header')
<h1><?=$action?> Employee</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=$action?> Employee</h3>
        <a style="float: right;" class="btn btn-default" href="{{ route('admin.employee.index') }}">Back</a>
    </div>

    <div class="card-body p-0 mt-4">
        <div class="container">

            @include('components.error_msg')

            <form action="<?=$formUrl?>" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($action == "Edit")
                @method('PATCH')
                @endif
                <div class="form-group">
                    <label>Select Company <span class="text-danger">*</span></label>
                    <select name="company_id" class="form-control">
                        <option value="">--Select Company--</option>
                        @foreach($companyData as $company)
                        <option {{ (@$data->company_id == $company->id) ? "selected" : "" }} value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="fname" value="{{old('fname', @$data->fname)}}" required>
                </div>
                <div class="form-group">
                    <label>Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="lname" value="{{old('lname', @$data->lname)}}" required>
                </div>
                <div class="form-group">
                    <label>Mobile number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" value="{{old('phone', @$data->phone)}}" required>
                </div>
                <div class="form-group">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{old('email', @$data->email)}}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-default" value="<?=$action?> Data">
                </div>
            </form>
        </div>
    </div>

</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
