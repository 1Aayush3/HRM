@extends('layouts.index')
@section('title', Auth::user()->name)
@section('main-content')
<div class="col-md-9">
    <div class="card card-warning card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <!-- Profile Image -->
                <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.Auth::user()->image)}}"
                    alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"> {{Auth::user()->name}}</h3>
            <p class="text-muted text-center">{{Auth::user()->designation->designation}}</p>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Email</b> <a class="float-right"> {{Auth::user()->email}} </a>
                </li>
                <li class="list-group-item">
                    <b>Phone</b>
                    <a class="float-right">
                        <input id="userphone" class="" type="text" minlength="10" maxlength="14"
                            value="{{Auth::user()->z}} " readonly style="border: 0px transparent ">
                        <button type="button" class="btn btn-default" id="editbtn"><i class="fas fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-primary" id="updatephonebtn" hidden><i
                                class="fas fa-check"></i>
                        </button>
                    </a>

                </li>
                <li class="list-group-item">
                    <b>Alternate Email </b> <a class="float-right"> {{Auth::user()->alt_email}} </a>
                </li>
                <li class="list-group-item">
                    <b>Gender </b> <a class="float-right"> {{Auth::user()->gender}} </a>
                </li>
                <li class="list-group-item">
                    <b>Joined </b> <a class="float-right">{{Auth::user()->joined}}</a>
                </li>
                <li class="list-group-item">
                    <b>Review </b> <a class="float-right">{{Auth::user()->review}}</a>
                </li>
                <li class="list-group-item">
                    <b>Left </b> <a class="float-right">{{Auth::user()->left}}</a>
                </li>
                <li class="list-group-item">
                    <b>Account</b> <a class="float-right">{{Auth::user()->acc}}</a>
                </li>
                <li class="list-group-item">
                    <b>Bank</b> <a class="float-right">{{Auth::user()->bank}}</a>
                </li>
                <li class="list-group-item">
                    <b>Branch </b> <a class="float-right">{{Auth::user()->branch}}</a>
                </li>
                <li class="list-group-item">
                    <b>PAN</b> <a class="float-right">{{Auth::user()->pan}}</a>
                </li>
                <li class="list-group-item">
                    <b>CIT </b> <a class="float-right">{{Auth::user()->cit}}</a>
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
                    url: "{{ route('users.update',Auth::user()->id)}}",
                    type: "PUT",
                    data: {   "_token": "{{ csrf_token() }}",
                            "phone" : phone,
                            "id" : {{Auth::user()->id}}
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
</script>
@endpush