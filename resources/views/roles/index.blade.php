@extends('layouts.index')
@section('title', 'Roles Management')
@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left mb-4">
            @can('role-create')
            <a class="btn btn-success pull-right" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>

    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table id="dataTable" class="table table-striped table-bordered" style="width:100%" examclass="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                @endcan
                @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline'])
                !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
    </tfoot>
</table>
{!! $roles->render() !!}
@endsection
@push('page-script')
<script>
    $('document').ready(function(){
    $('#dataTable').DataTable( {"columnDefs": [
    { "orderable": false, "targets": 2 }]});
})
</script>
@endpush