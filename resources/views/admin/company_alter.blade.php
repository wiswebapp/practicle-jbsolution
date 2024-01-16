@extends('adminlte::page')

@section('title', 'Companies Listing')

@section('content_header')
<h1><?=$action?> Companies</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=$action?> Companies</h3>
        <a style="float: right;" class="btn btn-default" href="{{ route('admin.company.create') }}">Create New</a>
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
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{old('name', $data->name)}}" required>
                </div>
                <div class="form-group">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{old('email', $data->email)}}" required>
                </div>
                <div class="form-group">
                    <label>Website <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="website" value="{{old('website', $data->website)}}" required>
                </div>
                <div class="form-group">
                    <label>Logo (100x100) </label>
                    <input type="file" class="form-control" name="logo">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-success" value="<?=$action?> Data">
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
