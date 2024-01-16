@extends('adminlte::page')

@section('title', 'Employee Listing')

@section('content_header')
<h1>Employee Listing</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Employee listing</h3>
        <a style="float: right;" class="btn btn-default" href="{{ route('admin.employee.create') }}">Create New</a>
    </div>

    @include('components.error_msg')

    <div class="card-body p-0">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->total())
                    @foreach($data as $emp)
                    <tr>
                        <td>{{ $emp->fname . " " . $emp->lname}}</td>
                        <td>{{ $emp->company->name }}</td>
                        <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
                        <td>isometric.mohsin@gmail.com</td>
                        <td>+923335586757</td>
                        <td>+923335586757</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">No Data found !</td>
                    </tr>
                    @endif
                </tbody>
            </table>
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
