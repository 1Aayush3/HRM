@extends('layouts.index')
@section('title', 'Settings')
@section('main-content')
{{-- <div class="card text-center">
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

<div class="card-body " id="collapseExample1">
    {{-- <h5 class="card-title">Add Designation</h5> --}}
        <p class="card-text">
            <div class="card">
                <div class="card-body">
                    <h1><label for='add'>Add Designation:</label></h1>
                    <input id="add" class="" type="text" minlength="5">
                    <button class="btn btn-primary" id="addD"><i class="fas fa-check"></i></button>
                    <small id="error">
                        <ul id="EL"></ul>
                    </small>
                </div>
            </div>
        </p>
    </div>
</div> --}}

<div class="container">
    <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-user">Add New</a>
    <br><br>
     
    <table class="table table-bordered table-striped" id="laravel_datatable">
       <thead>
          <tr>
             <th>ID</th>
            
             <th>Designation</th>
            
             <th>Action</th>
          </tr>
       </thead>
    </table>
    </div>
     
    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrudModal"></h4>
        </div>
        <div class="modal-body">
            <form id="userForm" name="userForm" class="form-horizontal">
               <input type="hidden" name="user_id" id="user_id">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Designation</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                    </div>
                </div>
     
                <div class="col-sm-offset-2 col-sm-10">
                 <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                 </button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
        </div>
    </div>
    </div>
    </div>
@endsection

@push('page-script')
<script>
    var SITEURL = '{{URL::to('')}}';
     $(document).ready( function () {
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#laravel_datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: {
              url: SITEURL + "settings",
              type: 'GET',
             },
             columns: [
                      {data: 'id', name: 'id', 'visible': false},
                      {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                      { data: 'name', name: 'name' },
                      
                      {data: 'action', name: 'action', orderable: false},
                   ],
            order: [[0, 'desc']]
          });
     /*  When user click add user button */
        $('#create-new-user').click(function () {
            $('#btn-save').val("create-user");
            $('#user_id').val('');
            $('#userForm').trigger("reset");
            $('#userCrudModal').html("Add New User");
            $('#ajax-crud-modal').modal('show');
        });
     
       /* When click edit user */
        $('body').on('click', '.edit-user', function () {
          var user_id = $(this).data('id');
          $.get('ajax-crud-list/' + user_id +'/edit', function (data) {
             $('#name-error').hide();
             $('#email-error').hide();
             $('#userCrudModal').html("Edit User");
              $('#btn-save').val("edit-user");
              $('#ajax-crud-modal').modal('show');
              $('#user_id').val(data.id);
              $('#name').val(data.name);
              $('#email').val(data.email);
          })
       });
        $('body').on('click', '#delete-user', function () {
     
            var user_id = $(this).data("id");
            confirm("Are You sure want to delete !");
     
            $.ajax({
                type: "get",
                url: SITEURL + "ajax-crud-list/delete/"+user_id,
                success: function (data) {
                var oTable = $('#laravel_datatable').dataTable(); 
                oTable.fnDraw(false);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });   
       });
     
    if ($("#userForm").length > 0) {
          $("#userForm").validate({
     
         submitHandler: function(form) {
     
          var actionType = $('#btn-save').val();
          $('#btn-save').html('Sending..');
          
          $.ajax({
              data: $('#userForm').serialize(),
              url: SITEURL + "ajax-crud-list/store",
              type: "POST",
              dataType: 'json',
              success: function (data) {
     
                  $('#userForm').trigger("reset");
                  $('#ajax-crud-modal').modal('hide');
                  $('#btn-save').html('Save Changes');
                  var oTable = $('#laravel_datatable').dataTable();
                  oTable.fnDraw(false);
                  
              },
              error: function (data) {
                  console.log('Error:', data);
                  $('#btn-save').html('Save Changes');
              }
          });
        }
      })
    }
    </script>
{{-- <script>
    $('document').ready(function(){
            $('#desTable').DataTable({
                "columnDefs": [{ "orderable": false, "targets": 2 }],
            });
        }       
    );
    $('#addD').on('click',()=>{
        $('#addD').prop('disabled',true);
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
                        $('#EL').empty().css({"color":"green"});
                        $('#EL').append("<li>Sucessfully Stored!</li>");
                        $('#add').val("");
                        $('#addD').prop('disabled',false);
                        $('#desTable').DataTable().row.add( [
                            data.id,
                            data.designation,
                            data.id                           
                        ] ).draw( false );
                    } ,
                    error: function (request) {
                        $('#EL').empty().css({"color":"red"});
                        $.each(request.responseJSON.errors.designation,function (i, val) {
                            $('#EL').append("<li>"+val+"</li>");
                            $('#addD').prop('disabled',false);
                        });

                    },
                }
            );
    });
</script> --}}
@endpush