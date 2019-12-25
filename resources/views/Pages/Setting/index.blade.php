@extends('layouts.index')
@section('title', 'Settings')
@section('main-content')
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">Designation List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                    aria-controls="collapseExample1">Add Designation</a>
            </li>
        </ul>
    </div>

    <div class="card-body " id="collapseExample">
        <p class="card-text">
            <h5 class="card-title">Designation List</h5>
            <table id="desTable" class="table table-striped table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Designations</th>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach ($des as $des)
                    <tr>
                        <td>{{$des->id}}</td>
                        <td>{{$des->designation}}</td>
                        <td style="display:inline-flex">

                            {!! Form::open(['method' => 'GET', 'url' => route('settings.edit', $des->id)]) !!}
                            <button id='show' type="submit" class="btn btn-primary" style="margin-right:5px;">
                                Edit
                            </button>
                            {!! Form::close() !!}

                            {!! Form::open(['method' => 'DELETE', 'url' => route('settings.destroy',$des->id)]) !!}
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary">
                                Remove</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </p>
    </div>

    <div class="card-body " id="collapseExample1">
        {{-- <h5 class="card-title">Add Designation</h5> --}}
        <p class="card-text">
            <div class="card">
                <div class="card-body">
                    <h1><label for='add'>Add Designation:</label></h1>
                    <input id="add" class="" type="text" minlength="5">
                    <button class="btn btn-primary" id="addD"><i class="fas fa-check"></i></button>
                    <small id="error" style="color:red;"></small>
                </div>
            </div>
        </p>
    </div>
</div>
@endsection
@push('page-script')
<script>
    $('document').ready(function(){
            $('#desTable').DataTable({
                "columnDefs": [{ "orderable": false, "targets": 2 }],
            });
        }       
    );
    $('#addD').on('click',()=>{
        var designation = $('#add').val()?$('#add').val():null;
        $.ajax({
                    url: "{{ route('settings.store')}}",
                    type: "POST",
                    data: {   
                        "_token": "{{ csrf_token() }}",
                        "designation" : designation,
                    },
                    success: function (data) {
                        console.log(data);
                        if($('#add'.hasClass('error'))){
                            $('#add').removeClass('error');
                        }
                    } ,
                    error: function (request) {
                        console.log(request);
        
                    },
                }
            );
    });
</script>
@endpush