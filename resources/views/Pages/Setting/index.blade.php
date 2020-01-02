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
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                    aria-controls="collapseExample1">Add Designation</a>
            </li> --}}

        </ul>
    </div>

    <div class="card-body " id="collapseExample">
        <button class="btn btn-primary" data-toggle="modal" data-target="#desg-modal">Add Designation</button>
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
                        <td class="desid" data-id="{{$des->id}}">{{$des->id}}</td>
                        <td>{{$des->designation}}</td>
                        <td style="display:inline-flex">

                            <button id='show' type="submit" class="btn btn-primary edit" style="margin-right:5px;">
                                Edit
                            </button>

                            {!! Form::open(['method' => 'DELETE', 'url' => route('settings.destroy',$des->id)]) !!}
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary">
                                Remove
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </p>
    </div>

    {{-- <div class="card-body " id="collapseExample1">
        <h5 class="card-title">Add Designation</h5>
        <p class="card-text">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </p>
    </div> --}}
</div>

{{-- modal view for add --}}

<div class="modal fade" id="desg-modal" tabindex="-1" role="dialog" aria-labelledby="modaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitle">Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1><label for='add'>Add Designation:</label></h1>
                <input id="add" class="" type="text" minlength="5">
                <button class="btn btn-primary" id="addB"><i class="fas fa-check"></i></button>
            </div>
            <div class="modal-footer">
                <small id="error"></small>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('page-script')
<script>
    $('document').ready(function(){
        $('#ED').on('click',()=>{
        $('#editD').val();
        });
        $('#desTable').DataTable({
           "columnDefs": [{ "orderable": false, "targets": 2 }],
        });
    });

    $('#addB').on('click',()=>{
        $('#addB').prop('disabled',true);
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
                        $('#error').empty().css({"color":"green"})
                        .html("Sucessfully Stored!").fadeOut(5000);
                        $('#add').val("");
                        $('#addB').prop('disabled',false);
                        $('#desTable').DataTable().row.add( [
                            data.id,
                            data.designation,
                            `<button type="button"  class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal">
                                    Edit
                            </button>
                            <button type="button" id="RD" class="btn btn-primary">
                                Remove
                            </button>`])
                        .draw( false );
                    } ,                    
                    error: function (request) {
                        $('#error').empty().css({"color":"red"});
                        $.each(request.responseJSON.errors.designation,function (i, val) {
                            $('#error').append(val);
                            $('#addB').prop('disabled',false);
                        });

                    },
                }
            );
    });
    $('tbody').on('click','.edit',function(){
        console.log();
         let item =$(this).closest('tr').find('td.desid');
         let id= item.data('id');
         $('#add').val(id);
         $('#desg-modal').modal('show');
    })

</script>
@endpush