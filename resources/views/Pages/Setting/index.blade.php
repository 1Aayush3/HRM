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
        </ul>
    </div>

    <div class="card-body col-12 " id="collapseExample">
        <button id="addDesignation" class="btn btn-primary">Add Designation</button>
        <div class="table">
            <table id="desTable" style="width:100%;" class="table table-striped table-bordered ">
                <thead>
                    <th>ID</th>
                    <th>Designations</th>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach ($des as $key => $des)
                    <tr>
                        <td class="desid" data-id="{{$des->id}}">{{$des->id}}</td>
                        <td class="desname">{{$des->designation}}</td>
                        <td style="display:inline-flex">
                            <button id='show' type="submit" class="btn btn-primary edit" style="margin-right:5px;">
                                Edit
                            </button>

                            <button type="submit" class="btn btn-primary RD">
                                Remove
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{--------------------------------------modal view for add ----------------------------------}}
<div class="modal fade" id="desg-modal" tabindex="-1" role="dialog" aria-labelledby="modaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text" id="modaltitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="add" class="" type="text" minlength="5">
                <button class="btn btn-primary" id="addB"><i class="fas fa-check"></i></button>

                <input id="update" class="" type="text" minlength="5">
                <button class="btn btn-primary" id="addE"><i class="fas fa-check"></i></button>
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
    var button = `<button type="button"  class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal">
                                    Edit
                            </button>
                            <button type="button" class="btn btn-primary RD">
                                Remove
                            </button>`;
    $('document').ready(function(){
      var table =  $('#desTable').DataTable({
           "columnDefs": [{ "orderable": false, "targets": 2 }],
        });
    });

    /*----------------------Add Designation Button-----------------------------*/
    $('#addDesignation').on('click',()=>{
        console.log($(this));
        console.log(this);

        $('#modaltitle').text('Add Designation');
        $('#addE').hide();
        $('#update').hide();
        $('#addB').show();
        $('#add').show();
        $('#add').val("");
        $('#error').empty();
        $('#desg-modal').modal('show');
        
    })
    
     /*----------------------Add Button of Create-----------------------------*/
    $('#addB').on('click',()=>{
        $('#addB').prop('disabled',true);
        var designation = $('#add').val()?$('#add').val():null;
        nProgressBar();
        $.ajax({
                    url: "{{ route('settings.store')}}",
                    type: "POST",
                    data: {   
                        "_token": "{{ csrf_token() }}",
                        "designation" : designation,
                    },
                    success: function (data) {
                        $('#error').empty().css({"color":"green"})
                        .html("Sucessfully Stored!").fadeOut(5000);
                        $('#add').val("");
                        $('#addB').prop('disabled',false);
                        $('#desTable').DataTable().row.add( [
                            data.id,
                            data.designation,
                            button
                           ])
                        .draw( false );
                        setTimeout(() => {
                            $('#desg-modal').modal('hide');
                        }, 1000);
                        
                    } ,                    
                    error: function (request) {
                        var err ='';
                        $('#error').empty().css({"color":"red"});
                        $.each(request.responseJSON.errors.designation,function (i, val) {
                            err = err +'<br>'+ val;
                        });
                        $('#error').html(err);
                        $('#addB').prop('disabled',false);
                    },
                }
            );
        NProgress.done();
    });

    /*----------------------Remove Button-----------------------------*/
    $('tbody').on('click','.RD',function(){
        var id = $(this).parent().siblings(":first").text();
        var ele = $(this);
        removeAlert().then((willDelete) => {
        if (willDelete) {
            nProgressBar();
            $.ajax({
                url: 'settings/'+id,
                type: "DELETE",
                data: {   
                    "_token": "{{ csrf_token() }}",
                    "id" : id,
                },
                success: function (data) {
                    $('#desTable').DataTable()        
                    .row( ele.parents('tr') )
                    .remove()
                    .draw();
                } , 
                error: function (request) {
                    var err ='';
                    $('#error').empty().css({"color":"red"});
                    $.each(request.responseJSON.errors.designation,function (i, val) {
                        err = err +'<br>'+ val;
                    });
                    $('#error').html(err);
                    $('#addB').prop('disabled',false);
                },
            } );
            NProgress.done();
            swal("Poof! Designation has been removed!", {
                icon: "success",
            });
        } else {
            swal("The designation is safe!");
        }
        });
    });

     /*----------------------Edit Button-----------------------------*/
    $('tbody').on('click','.edit',function(){
        var id = $(this).parent().siblings(":first").text();
        var name = $(this).parent().siblings().next(':first').text();
        $('#error').empty();
        $(this).closest('tr').addClass('selected');
        $('#addB').hide();
        $('#add').hide();
        $('#addE').show();
        $('#update').show();
        $('#modaltitle').text('Edit Designation');
        $('#update').val(name);
        $('#update').attr('data-id',id);
        $('#desg-modal').modal('show');
    })

    /*----------------------Edit Button of Edit-----------------------------*/
    $('#desg-modal').on('click','#addE',function(){
        var id = $('#update').attr('data-id');
        var name = $('#update').val();
        console.log(id);
        console.log(name);
        nProgressBar();

        
        $.ajax({    
                url: 'settings/'+id,
                type: "PUT",
                data: {   
                    "_token": "{{ csrf_token() }}",
                    "id" : id,
                    "designation": name,
                },

                success: function (data) {
                    var select = $('tr.selected')
                    var input = select.data();
                    $('#desTable').DataTable().row(select).data([data.id,data.designation,button]).draw();
                    $('#update').attr('data-id','');                    
                    $('#update').val('');
                    $('#desg-modal').modal('hide');
                }, 

                error: function (request) {
                    var err ='';
                    $('#error').empty().css({"color":"red"});
                    console.log(request);
                    
                    $.each(request.responseJSON.errors.designation,function (i, val) {
                        err = err +'<br>'+ val;
                    });
                    $('#error').html(err);
                    $('#addB').prop('disabled',false);
                }
            }
        )
        NProgress.done();
    })

    $("#desg-modal").on('hidden.bs.modal', function () {
        $('tr').removeClass('selected');
        $('#update').attr('data-id','');
    });
</script>
@endpush