<div class="card-columns m-auto p-3">
    <div class="card mb-5" id="card-general-info">
        <div class="card-header text-center" style="background: #d1d4d4;">General</div>
        <div class="card-body pb-0">


            <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
                {{ Form::label('name', 'Name *') }}
                {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name here','required'=>'required']) }}
                <small style="color:red;">{!! $errors->first('name', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
                {{ Form::label('email', 'Email *') }}
                {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email Address','required'=>'required']) }}
                <small style="color:red;">{!! $errors->first('email', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
                {{ Form::label('phone', 'Phone number') }}
                {{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'Phone']) }}
                <small style="color:red;">{!! $errors->first('phone', '<p class="help-block">:message</p>')
                    !!}</small>
            </div>
            <div class="form-group{{ $errors->has('alt_email') ? 'has-error' : ''}}">
                {{ Form::label('alt_email', 'Alternate Email') }}
                {{ Form::text('alt_email',null,['class'=>'form-control','placeholder'=>'Email Address']) }}
                <small style="color:red;">{!! $errors->first('alt_email', '<p class="help-block">:message</p>')
                    !!}</small>
            </div>
            <div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}" id="password">
                {{ Form::label('password', 'Password *') }}
                {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password']) }}
                <small style="color:red;">{!! $errors->first('password', '<p class="help-block">:message</p>')
                    !!}</small>
            </div>
            <div class="form-group{{ $errors->has('dob') ? 'has-error' : ''}}">
                {{ Form::label('dob', 'Date Of Birth *') }}
                {{Form::date('dob',null,['class'=>'form-control','id'=>'txtDob'])}}
                <small style="color:red;">{!! $errors->first('dob', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('gender') ? 'has-error' : ''}}">
                Gender * :
                {{ Form::radio('gender', 'M',true)}}
                {{ Form::label('gender', 'Male') }}
                {!! Form::radio('gender', 'F') !!}
                {!! Form::label('gender', 'Female') !!}
                {!! Form::radio('gender', 'O') !!}
                {!! Form::label('gender', 'Others') !!}
                <small style="color:red;">{!! $errors->first('gender', '<p class="help-block">:message</p>') !!}</small>
            </div>
        </div>
    </div>
    <div class="card" id="card-office-info">
        <div class="card-header text-center" style="background: #d1d4d4;">Official Info</div>
        <div class="card-body pb-0">
            <div class="form-group{{ $errors->has('designation_id') ? 'has-error' : ''}}">
                {{ Form::label('designation_id', 'Designation *') }}
                {{Form::select('designation_id',$des, null, ['class'=>'form-control','placeholder' => 'Pick'])}}
                <small style="color:red;">{!! $errors->first('designation_id', '<p class="help-block">:message</p>')
                    !!}</small>
            </div>
            <div class="form-group{{ $errors->has('joined') ? 'has-error' : ''}}">
                {{ Form::label('joined', 'Joined Date *') }}
                {{ Form::date('joined',null,['class'=>'form-control','id'=>'txtStartDate','required'=>'required']) }}
                <small style="color:red;">{!! $errors->first('joined', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('left') ? 'has-error' : ''}}">
                {{ Form::label('left', 'Left Date') }}
                {{ Form::date('left',null,['class'=>'form-control','id'=>'txtEndDate']) }}
                <small style="color:red;">{!! $errors->first('left', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('review') ? 'has-error' : ''}}">
                {{ Form::label('review', 'Review Date') }}
                {{ Form::date('review',null,['class'=>'form-control','id'=>'txtReviewDate'])}}
                <small style="color:red;">{!! $errors->first('review', '<p class="help-block">:message</p>') !!}</small>
            </div>
        </div>
    </div>
    <div class="card mb-5" id="card-official-info">
        <div class="card-header text-center" style="background: #d1d4d4;">Personal InFo</div>
        <div class="card-body pb-0">
            <div class="form-group{{ $errors->has('bank') ? 'has-error' : ''}}">
                {{ Form::label('bank', 'Bank') }}
                {{ Form::text('bank',null,['class'=>'form-control','placeholder'=>'Bank Name']) }}
                <small style="color:red;">{!! $errors->first('bank', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('branch') ? 'has-error' : ''}}">
                {{ Form::label('branch', 'Bank Branch') }}
                {{ Form::text('branch',null,['class'=>'form-control','placeholder'=>'Branch']) }}
                <small style="color:red;">{!! $errors->first('branch', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('acc') ? 'has-error' : ''}}">
                {{ Form::label('acc', 'Account') }}
                {{ Form::text('acc',null,['class'=>'form-control','placeholder'=>'Account Number']) }}
                <small style="color:red;">{!! $errors->first('acc', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('pan') ? 'has-error' : ''}}">
                {{ Form::label('pan', 'Pan') }}
                {{ Form::text('pan',null,['class'=>'form-control','placeholder'=>'Pan Number']) }}
                <small style="color:red;">{!! $errors->first('pan', '<p class="help-block">:message</p>') !!}</small>
            </div>
            <div class="form-group{{ $errors->has('cit') ? 'has-error' : ''}}">
                {{ Form::label('cit', 'CIT') }}
                {{ Form::text('cit',null,['class'=>'form-control','placeholder'=>'CIT Number']) }}
                <small style="color:red;">{!! $errors->first('cit', '<p class="help-block">:message</p>') !!}</small>
            </div>
        </div>
    </div>
    <div class="card" id="card-image-upload">
        <div class="card-header text-center" style="background:#d1d4d4;">Uploads</div>
        <div class="card-body pb-0">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="profile-image">Profile</span>
                </div>
                <div class="custom-file{{ $errors->has('image') ? 'has-error' : ''}}">
                    {!! Form::file('image', ['ref'
                    =>'file','class'=>'custom-file-input','id'=>'profile-image','accept'=>'image/*','aria-describedby'=>'profile-image'])!!}
                    <label class="custom-file-label" for="profile-image">Choose file</label>
                    <small style="color:red;">{!! $errors->first('image', '<p class="help-block">:message</p>')
                        !!}</small>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="cit-image">CIT</span>
                </div>
                <div class="custom-file{{ $errors->has('cit_img') ? 'has-error' : ''}}">
                    {!! Form::file('cit_img', ['ref' => 'file',
                    'class'=>'custom-file-input','id'=>'cit-image','accept'=>'image/*','aria-describedby'=>'cit-image'])!!}
                    <label class="custom-file-label" for="cit-image">Choose file</label>
                    <small style="color:red;">{!! $errors->first('cit_img', '<p class="help-block">:message</p>')
                        !!}</small>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend ">
                    <span class="input-group-text" id="citizenship-image">Citizenship</span>
                </div>
                <div class="custom-file{{ $errors->has('citizenship') ? 'has-error' : ''}}">
                    {!! Form::file('citizenship', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'citizenship-image','aria-describedby'=>'citizenship-image'])!!}
                    <label class="custom-file-label" for="citizenship-image">Choose file</label>
                    <small style="color:red;">{!! $errors->first('citizenship', '<p class="help-block">:message</p>')
                        !!}</small>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="pan-image">PAN</span>
                </div>
                <div class="custom-file{{ $errors->has('pan_img') ? 'has-error' : ''}}">
                    {!! Form::file('pan_img', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'pan-image','aria-describedby'=>'pan-image'])!!}
                    <label class="custom-file-label" for="pan-image">Choose file</label>
                    <small style="color:red;">{!! $errors->first('pan_img', '<p class="help-block">:message</p>')
                        !!}</small>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="contract-image">Contract</span>
                </div>
                <div class="custom-file{{ $errors->has('contract') ? 'has-error' : ''}}">
                    {!! Form::file('contract', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'contract-image','aria-describedby'=>'contract-image'])!!}
                    <label class="custom-file-label" for="contract-image">Choose file</label>
                    <small style="color:red;">{!! $errors->first('contract', '<p class="help-block">:message</p>')
                        !!}</small>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="appointment-image">Appointment</span>
                </div>
                <div class="custom-file{{ $errors->has('appoinment') ? 'has-error' : ''}}">
                    {!! Form::file('appointment', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'appointment-image','aria-describedby'=>'appointment-image'])!!}
                    <label class="custom-file-label" for="appointment-image">Choose file</label>
                    <small style="color:red;">{!! $errors->first('appoinment', '<p class="help-block">:message</p>')
                        !!}</small>
                </div>
            </div>
        </div>
    </div>
</div>