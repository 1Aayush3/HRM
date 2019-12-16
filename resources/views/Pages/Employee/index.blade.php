@extends('layouts.index')
@section('title', 'Employees List')
@section('main-content')
<table id="example" class="table table-striped table-bordered" style="width:100%" examclass="table table-hover">
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
        <tr style="font-weight:500;">
            <td>{{$key +1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->designation->designation}}</td>
            <td style="display:inline-flex">
                {!! Form::open(['method' => 'GET', 'url' => route('employees.show', $user->id)]) !!}
                <button id='show' type="submit" class="btn btn-primary" style="margin-right:5px;">
                    Details
                </button>
                {!! Form::close() !!}

                {!! Form::open(['method' => 'GET', 'url' => route('employees.edit', $user->id)]) !!}
                <button id='show' type="submit" class="btn btn-primary" style="margin-right:5px;">
                    Edit
                </button>
                {!! Form::close() !!}

                {!! Form::open(['method' => 'DELETE', 'url' => route('employees.destroy',$user->id)]) !!}
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary">
                    Remove</button>
                {!! Form::close() !!}
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
@endsection
@push('page-script')
<script>
    // $('#example').DataTable({
    //         "columns": [
    //             null,
    //             null,
    //             null,
    //             null,
    //             { "orderable": false }
    //         ]
    //     });
</script>
@endpush