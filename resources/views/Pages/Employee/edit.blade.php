@extends('layouts.index')
@section('title', 'Edit')
@section('main-content')

{!! Form::model($user, ['method' => 'PUT', 'url' => route('employees.update', $user->id)])!!}
<div class="box-body">
    @include('Pages.Employee.form')
</div>
<div class="box-footer">
    <div class="card">
        <div class="card-footer text-center mt-0">
            {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
</form>
@endsection
@push('page-script')
<script>
    $('document').ready(function() {
    console.log( "ready!" );
    setTimeout(() => {
        $('#password').fadeOut('slow')
    }, 1000);
    });
</script>
@endpush