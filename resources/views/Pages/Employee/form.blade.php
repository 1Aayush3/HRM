<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name','',['class'=>'form-control','placeholder'=>'Name here','required'=>'required']) }}
    {{-- @if(error->has('name')){
    <label>{{$errror}}</label>
    } --}}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email','example@gmail.com',['class'=>'form-control','placeholder'=>'Email Address','required'=>'required']) }}
</div>

<div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'=>'required']) }}
</div>

<div class="form-group">
    {{ Form::label('alt_email', 'Alternate Email') }}
    {{ Form::text('alt_email','',['class'=>'form-control','placeholder'=>'Email Address']) }}
</div>

<div class="form-group">
    {{ Form::label('dob', 'Date Of Birth') }}
    {{Form::date('dob','',['class'=>'form-control'])}}
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

<div class="form-group">
    {{ Form::label('joined', 'Joined Date') }}
    {{ Form::date('joined','',['class'=>'form-control','required'=>'required']) }}
</div>

<div class="form-group">
    {{ Form::label('left', 'Left Date') }}
    {{ Form::date('left','',['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('review', 'Review Date') }}
    {{ Form::date('review','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{ Form::label('designation_id', 'Designation') }}
    {{Form::select('designation_id',$des, null, ['class'=>'form-control','placeholder' => 'Pick'])}}
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
    {!! Form::file('image', ['ref' => 'file'])!!}}
</div>

<div class="form-group">
    {{ Form::label('cit_img', 'CIT Image') }}
    {!! Form::file('cit_img', ['ref' => 'file', ])!!}
</div>

<div class="form-group">
    {{ Form::label('citizenship', 'Citizenship') }}
    {!! Form::file('citizenship', ['ref' => 'file'])!!}
</div>

<div class="form-group">
    {{ Form::label('pan_img', 'Pan Image') }}
    {!! Form::file('pan_img', ['ref' => 'file'])!!}
</div>

<div class="form-group">
    {{ Form::label('contract', 'Contract') }}
    {!! Form::file('contract', ['ref' => 'file'])!!}
</div>

<div class="form-group">
    {{ Form::label('appointment', 'Appointment') }}
    {!! Form::file('appointment', ['ref' => 'file'])!!}
</div>