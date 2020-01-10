@extends('layouts.index')
@section('title', 'Employees List')
@section('main-content')
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%" examclass="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $key=>$user )
            <tr style="font-weight:400;">
                <td>{{$key +1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->designation->designation}}</td>
                <td style="display:inline-flex">
                    @can('employee-list')
                    {!! Form::open(['method' => 'GET', 'url' => route('employees.show', $user->id)]) !!}
                    <button id='show' type="submit" class="btn btn-primary" style="margin-right:5px;">
                        Details
                    </button>
                    @endcan
                    {!! Form::close() !!}
                    @can('employee-edit')
                    {!! Form::open(['method' => 'GET', 'url' => route('employees.edit', $user->id)]) !!}
                    <button id='show' type="submit" class="btn btn-primary" style="margin-right:5px;">
                        Edit
                    </button>
                    {!! Form::close() !!}
                    @endcan
                    @can('employee-delete')
                    {!! Form::open(['method' => 'DELETE', 'url' => route('employees.destroy',$user->id),'id'=>'submitRemove']) !!}
                    <button type="submit" onclick="return formRemove()" class="btn btn-primary">
                        Remove</button>
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
@push('page-script')
<script>
    $('document').ready(function(){
    $('#dataTable').DataTable( {"columnDefs": [
    { "orderable": false, "targets": 4 }]});
})
</script>
@endpush