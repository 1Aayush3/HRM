<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name','',['class'=>'form-control','placeholder'=>'Name here','required'=>'required']) }}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email','example@gmail.com',['class'=>'form-control','placeholder'=>'Email Address','required'=>'required']) }}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'=>'required']) }}
    <small class="text-danger">{{ $errors->first('password') }}</small>
</div>

<div class="form-group{{ $errors->has('alt_email') ? ' has-error' : '' }}">
    {{ Form::label('alt_email', 'Alternate Email') }}
    {{ Form::text('alt_email','',['class'=>'form-control','placeholder'=>'Email Address']) }}
    <small class="text-danger">{{ $errors->first('alt_email') }}</small>
</div>

<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
    {{ Form::label('dob', 'Date Of Birth') }}
    {{Form::date('dob','',['class'=>'form-control'])}}
    <small class="text-danger">{{ $errors->first('dob') }}</small>

</div>

<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
    <b> Gender:</b>
    {!! Form::radio('gender', 'M',true)!!}
    {!! Form::label('gender', 'Male') !!}
    {!! Form::radio('gender', 'F') !!}
    {!! Form::label('gender', 'Female') !!}
    {!! Form::radio('gender', 'O') !!}
    {!! Form::label('gender', 'Others') !!}
    <small class="text-danger">{{ $errors->first('gender') }}</small>
</div>

<div class="form-group{{ $errors->has('joined') ? ' has-error' : '' }}">
    {{ Form::label('joined', 'Joined Date') }}
    {{ Form::date('joined','',['class'=>'form-control','required'=>'required']) }}
    <small class="text-danger">{{ $errors->first('joined') }}</small>
</div>

<div class="form-group{{ $errors->has('left') ? ' has-error' : '' }}">
    {{ Form::label('left', 'Left Date') }}
    {{ Form::date('left','',['class'=>'form-control']) }}
    <small class="text-danger">{{ $errors->first('left') }}</small>
</div>

<div class="form-group{{ $errors->has('review') ? ' has-error' : '' }}">
    {{ Form::label('review', 'Review Date') }}
    {{ Form::date('review','',['class'=>'form-control'])}}
    <small class="text-danger">{{ $errors->first('review') }}</small>
</div>

<div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }}">
    {{ Form::label('designation_id', 'Designation') }}
    {{Form::select('designation_id',$des, null, ['class'=>'form-control','placeholder' => 'Pick'])}}
    <small class="text-danger">{{ $errors->first('designation_id') }}</small>
</div>

<div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
    {{ Form::label('pan', 'Pan') }}
    {{ Form::text('pan','',['class'=>'form-control','placeholder'=>'Pan Number']) }}
    <small class="text-danger">{{ $errors->first('pan') }}</small>
</div>

<div class="form-group{{ $errors->has('cit') ? ' has-error' : '' }}">
    {{ Form::label('cit', 'CIT') }}
    {{ Form::text('cit','',['class'=>'form-control','placeholder'=>'CIT Number']) }}
    <small class="text-danger">{{ $errors->first('cit') }}</small>
</div>

<div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
    {{ Form::label('bank', 'Bank') }}
    {{ Form::text('bank','',['class'=>'form-control','placeholder'=>'Bank Name']) }}
    <small class="text-danger">{{ $errors->first('bank') }}</small>
</div>

<div class="form-group{{ $errors->has('acc') ? ' has-error' : '' }}">
    {{ Form::label('acc', 'Account') }}
    {{ Form::text('acc','',['class'=>'form-control','placeholder'=>'Account Number']) }}
    <small class="text-danger">{{ $errors->first('acc') }}</small>
</div>

<div class="form-group{{ $errors->has('branch') ? ' has-error' : '' }}">
    {{ Form::label('branch', 'Bank Branch') }}
    {{ Form::text('branch','',['class'=>'form-control','placeholder'=>'Branch']) }}
    <small class="text-danger">{{ $errors->first('branch') }}</small>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="exampleInputFile">Upload Image</label>
    {!! Form::file('image', ['ref' => 'file'])!!}}
    <small class="text-danger">{{ $errors->first('image') }}</small>
</div>

<div class="form-group{{ $errors->has('cit_img') ? ' has-error' : '' }}">
    {{ Form::label('cit_img', 'CIT Image') }}
    {!! Form::file('cit_img', ['ref' => 'file', ])!!}
    <small class="text-danger">{{ $errors->first('cit_img') }}</small>
</div>

<div class="form-group{{ $errors->has('citizenship') ? ' has-error' : '' }}">
    {{ Form::label('citizenship', 'Citizenship') }}
    {!! Form::file('citizenship', ['ref' => 'file'])!!}
    <small class="text-danger">{{ $errors->first('citizenship') }}</small>
</div>

<div class="form-group{{ $errors->has('pan_img') ? ' has-error' : '' }}">
    {{ Form::label('pan_img', 'Pan Image') }}
    {!! Form::file('pan_img', ['ref' => 'file'])!!}
    <small class="text-danger">{{ $errors->first('pan_img') }}</small>
</div>

<div class="form-group{{ $errors->has('contract') ? ' has-error' : '' }}">
    {{ Form::label('contract', 'Contract') }}
    {!! Form::file('contract', ['ref' => 'file'])!!}
    <small class="text-danger">{{ $errors->first('contract') }}</small>
</div>

<div class="form-group{{ $errors->has('appointment') ? ' has-error' : '' }}">
    {{ Form::label('appointment', 'Appointment') }}
    {!! Form::file('appointment', ['ref' => 'file'])!!}
    <small class="text-danger">{{ $errors->first('appointment') }}</small>
</div>