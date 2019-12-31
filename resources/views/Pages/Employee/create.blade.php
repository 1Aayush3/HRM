@extends('layouts.index')
@section('title', 'Registration')
@section('main-content')
@can(employee-create)
{{ Form::open(array('url' => route('employees.store'),'class'=>'form-validation','method'=>'POST','enctype'=>'multipart/form-data'))}}
@csrf
<div class="box-body">
    @include('Pages.Employee.form')
</div>
<div class="box-footer">
    <div class="card">
        <div class="card-header text-center mt-0">
            <div class="card-title text-center mb-0">
                <div class="checkbox">
                    <label>
                        <input id="terms" type="checkbox" onclick="canSubmit()"> Terms and Conditions
                    </label>
                </div>
            </div>
            {{ Form::submit('Register', array('class' => 'btn btn-primary','id'=>'submit','disabled'=>'disabled')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
</form>
@endcan
@endsection
@push('page-script')
<script src="{{asset('js/formValidation.js')}}"></script>
@endpush