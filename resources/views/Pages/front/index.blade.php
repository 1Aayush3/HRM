@extends('layouts.index')
@section('title', $user->name)
@section('main-content')

<div class="col-md-9">

    <div class="card card-warning card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <!-- Profile Image -->
                <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.$user->image)}}"
                    alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"> {{$user->name}}</h3>
            <p class="text-muted text-center">{{$user->designation->designation}}</p>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Email</b> <a class="float-right"> {{$user->email}} </a>
                </li>
                <li class="list-group-item">
                    <b>Phone</b>
                    <a class="float-right">
                        <input id="userphone" class="" type="text" minlength="10" maxlength="14"
                            value="{{$user->phone}} " readonly style="border: 0px transparent ">
                        <button type="button" class="btn btn-default" id="editbtn"><i class="fas fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-primary" id="updatephonebtn" hidden><i
                                class="fas fa-check"></i>
                        </button>
                    </a>

                </li>
                <li class="list-group-item">
                    <b>Alternate Email </b> <a class="float-right"> {{$user->alt_email}} </a>
                </li>
                <li class="list-group-item">
                    <b>Gender </b> <a class="float-right"> {{$user->gender}} </a>
                </li>
                <li class="list-group-item">
                    <b>Joined </b> <a class="float-right">{{$user->joined}}</a>
                </li>
                <li class="list-group-item">
                    <b>Review </b> <a class="float-right">{{$user->review}}</a>
                </li>
                <li class="list-group-item">
                    <b>Left </b> <a class="float-right">{{$user->left}}</a>
                </li>
                <li class="list-group-item">
                    <b>Account</b> <a class="float-right">{{$user->acc}}</a>
                </li>
                <li class="list-group-item">
                    <b>Bank</b> <a class="float-right">{{$user->bank}}</a>
                </li>
                <li class="list-group-item">
                    <b>Branch </b> <a class="float-right">{{$user->branch}}</a>
                </li>
                <li class="list-group-item">
                    <b>PAN</b> <a class="float-right">{{$user->pan}}</a>
                </li>
                <li class="list-group-item">
                    <b>CIT </b> <a class="float-right">{{$user->cit}}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@push('page-script')
<script>
    $('ol.breadcrumb').hide();
    //style="border: 0px transparent "
    $('#editbtn').on('click',()=>{
        $('#userphone').attr('readonly',false);
        $('#userphone').attr('style','')
        $('#editbtn').hide();
        $('#updatephonebtn').attr('hidden',false);
    });

    $('#updatephonebtn').on('click',()=>{
        var phone = $('#userphone').val()?$('#userphone').val():null;
        $.ajax({
                    url: "{{ route('users.update',$user->id)}}",
                    type: "PUT",
                    data: {   "_token": "{{ csrf_token() }}",
                            "phone" : phone,
                            "id" : {{$user->id}}
                    },
                    success: function (data) {
                        console.log(data);
                        $('#userphone').attr('readonly',true);
                        $('#userphone').attr('style','border: 0px transparent');
                        $('#userphone').removeClass('error');
                        $('#editbtn').show();
                        $('#updatephonebtn').attr('hidden',true);
                    } ,
                    error: function (error) {
                        $('#userphone').addClass('error');
                        console.log(`Error ${error}`);
                    },
                }
            );
    });

    // function toaAjax(inputFieldname,value) {
       
        
</script>
@endpush