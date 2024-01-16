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
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->total())
                    @foreach($data as $emp)
                    <tr>
                        <td>{{ $emp->fname . " " . $emp->lname}}</td>
                        <td>{{ $emp->company->name }}</td>
                        <td>{{ $emp->phone }}</td>
                        <td>{{ $emp->email }}</td>
                        <td>
                            <a href="{{ route('admin.employee.edit', $emp) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form onsubmit="return confirm('Do you really want to delete data?');" action="{{ route('admin.employee.destroy', $emp) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">No Data found !</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{ $data->links() }}
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
