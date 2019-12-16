<div class="card-columns m-auto p-3">
    <div class="card mb-4" id="card-general-info">
        <div class="card-header text-center" style="background: #d1d4d4;">General</div>
        <div class="card-body pb-0">
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name here','required'=>'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email Address','required'=>'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('alt_email', 'Alternate Email') }}
                {{ Form::text('alt_email',null,['class'=>'form-control','placeholder'=>'Email Address']) }}
            </div>
            <div class="form-group" id="password">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password']) }}
            </div>
            <div class="form-group">
                {{ Form::label('dob', 'Date Of Birth') }}
                {{Form::date('dob',null,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                <b> Gender:</b>
                {{ Form::radio('gender', 'M',true)}}
                {{ Form::label('gender', 'Male') }}
                {!! Form::radio('gender', 'F') !!}
                {!! Form::label('gender', 'Female') !!}
                {!! Form::radio('gender', 'O') !!}
                {!! Form::label('gender', 'Others') !!}
            </div>
        </div>
    </div>
    <div class="card" id="card-office-info">
        <div class="card-header text-center" style="background: #d1d4d4;">Dates</div>
        <div class="card-body pb-0">
            <div class="form-group">
                {{ Form::label('designation_id', 'Designation') }}
                {{Form::select('designation_id',$des, null, ['class'=>'form-control','placeholder' => 'Pick'])}}
            </div>
            <div class="form-group">
                {{ Form::label('joined', 'Joined Date') }}
                {{ Form::date('joined',null,['class'=>'form-control','required'=>'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('left', 'Left Date') }}
                {{ Form::date('left',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('review', 'Review Date') }}
                {{ Form::date('review',null,['class'=>'form-control'])}}
            </div>
        </div>
    </div>
    <div class="card" id="card-official-info">
        <div class="card-header text-center" style="background: #d1d4d4;">Official InFo</div>
        <div class="card-body pb-0">
            <div class="form-group">
                {{ Form::label('bank', 'Bank') }}
                {{ Form::text('bank',null,['class'=>'form-control','placeholder'=>'Bank Name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('branch', 'Bank Branch') }}
                {{ Form::text('branch',null,['class'=>'form-control','placeholder'=>'Branch']) }}
            </div>
            <div class="form-group">
                {{ Form::label('acc', 'Account') }}
                {{ Form::text('acc',null,['class'=>'form-control','placeholder'=>'Account Number']) }}
            </div>
            <div class="form-group">
                {{ Form::label('pan', 'Pan') }}
                {{ Form::text('pan',null,['class'=>'form-control','placeholder'=>'Pan Number']) }}
            </div>
            <div class="form-group">
                {{ Form::label('cit', 'CIT') }}
                {{ Form::text('cit',null,['class'=>'form-control','placeholder'=>'CIT Number']) }}
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
                <div class="custom-file">
                    {!! Form::file('image', ['ref'
                    =>'file','class'=>'custom-file-input','id'=>'profile-image','accept'=>'image/*','aria-describedby'=>'profile-image'])!!}
                    <label class="custom-file-label" for="profile-image">Choose file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="cit-image">CIT</span>
                </div>
                <div class="custom-file">
                    {!! Form::file('cit_img', ['ref' => 'file',
                    'class'=>'custom-file-input','id'=>'cit-image','accept'=>'image/*','aria-describedby'=>'cit-image'])!!}
                    <label class="custom-file-label" for="cit-image">Choose file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend ">
                    <span class="input-group-text" id="citizenship-image">Citizenship</span>
                </div>
                <div class="custom-file">
                    {!! Form::file('citizenship', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'citizenship-image','aria-describedby'=>'citizenship-image'])!!}
                    <label class="custom-file-label" for="citizenship-image">Choose file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="pan-image">PAN</span>
                </div>
                <div class="custom-file">
                    {!! Form::file('pan_img', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'pan-image','aria-describedby'=>'pan-image'])!!}
                    <label class="custom-file-label" for="pan-image">Choose file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="contract-image">Contract</span>
                </div>
                <div class="custom-file">
                    {!! Form::file('contract', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'contract-image','aria-describedby'=>'contract-image'])!!}
                    <label class="custom-file-label" for="contract-image">Choose file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="appointment-image">Appointment</span>
                </div>
                <div class="custom-file">
                    {!! Form::file('appointment', ['ref' =>
                    'file','class'=>'custom-file-input','id'=>'appointment-image','aria-describedby'=>'appointment-image'])!!}
                    <label class="custom-file-label" for="appointment-image">Choose file</label>
                </div>
            </div>
        </div>
    </div>
</div>