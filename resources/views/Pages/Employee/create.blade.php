@extends('layouts.index')
@section('title', 'Employee')
@section('main-content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Employee Registration Form</h3>
                </div>

                {{ Form::open(array('url' => route('users.store'),'enctype'=>'multipart/form-data' ))}}
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name','',['class'=>'form-control','placeholder'=>'Name here']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email','example@gmail.com',['class'=>'form-control','placeholder'=>'Email Address']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::text('password','',['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('alt_email', 'alt_email') }}
                        {{ Form::text('alt_email','',['class'=>'form-control','placeholder'=>'Email Address']) }}
                    </div>

                      <div class="form-group">
                        {{ Form::label('dob', 'Date Of Birth') }}
                        {{Form::date('dob','',['class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('joined', 'Joined Date') }}
                        {{ Form::date('joined','',['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('left', 'Left Date') }}
                        {{ Form::date('left','',['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('review', 'Review') }}
                        {{ Form::date('review','',['class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('designation_id', 'Designation') }}
                        {{ Form::select('designation_id','',['class'=>'form-control','placeholder'=>'Name here']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('pan', 'Pan') }}
                        {{ Form::text('pan','',['class'=>'form-control','placeholder'=>'Pan Number']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('cit', 'CIT') }}
                        {{ Form::text('cit','',['class'=>'form-control','placeholder'=>'CIT Number']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('bank', 'Bank') }}
                        {{ Form::text('bank','',['class'=>'form-control','placeholder'=>'Bank Name']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('acc', 'Account') }}
                        {{ Form::text('acc','',['class'=>'form-control','placeholder'=>'Account Number']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('branch', 'Bank Branch') }}
                        {{ Form::text('branch','',['class'=>'form-control','placeholder'=>'Branch']) }}
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Upload Image</label>
                        {!! Form::file('logo', ['ref' => 'file', 'id' => 'file'])!!}
                        <p class="help-block">Example block-level help text here.</p>
                    </div>

                    <div class="form-group">
                        {{ Form::label('cit_img', 'CIT Image') }}
                        {{ Form::text('cit_img','',['class'=>'form-control','placeholder'=>'Name here']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('citizenship', 'Citizenship') }}
                        {{ Form::text('citizenship','',['class'=>'form-control','placeholder'=>'Name here']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('pan_img', 'Pan Image') }}
                        {{ Form::text('pan_img','',['class'=>'form-control','placeholder'=>'Name here']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('contract', 'Contract') }}
                        {{ Form::text('contract','',['class'=>'form-control','placeholder'=>'Name here']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('appointment', 'Appointment') }}
                        {{ Form::text('appointment','',['class'=>'form-control','placeholder'=>'Name here']) }}
                    </div>

                    

                    <div class="checkbox">
                        <label>
                            <input id="terms" type="checkbox" onclick="canSubmit()"> Terms and Conditions
                        </label>
                    </div>

                </div>
            </div>
            <div class="box-footer">
                {{ Form::submit('Register', array('class' => 'btn btn-primary','id'=>'submit','disabled'=>'disabled')) }}
                {{ Form::close() }}
            </div>
            </form>
        </div>
    </div>
</section>
<div class="container ">
</div>
@endsection
@push('page-script')
<script>
    function canSubmit(){
        if($('#terms').is(':checked') == true){
            $('#submit').prop('disabled', false);
        } else {
            $('#submit').prop('disabled', true)
        }
    }
</script>
@endpush

@endsection