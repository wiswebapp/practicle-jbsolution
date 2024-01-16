@extends('adminlte::page')

@section('title', 'Companies Listing')

@section('content_header')
<h1>Companies Listing</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Companies listing</h3>
        <a style="float: right;" class="btn btn-default" href="{{ route('admin.company.create') }}">Create New</a>
    </div>

    @include('components.error_msg')

    <div class="card-body p-0">
        {{ $dataTable->table() }}
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
