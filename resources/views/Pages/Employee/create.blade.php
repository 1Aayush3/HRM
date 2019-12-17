@extends('layouts.index')
@section('title', 'Registration')
@section('main-content')

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
@endsection

@push('page-script')
<script>
    function canSubmit() {
        if ($('#terms').is(':checked') == true) {
            $('#submit').prop('disabled', false);
        } else {
            $('#submit').prop('disabled', true);
        }
    }

    var isAfterStartDate = function (txtStartDate, txtEndDate) {
        var startDate = new Date(txtStartDate);
        var endDate = new Date(txtEndDate);

        if (startDate < endDate) {
            return true;
        }
    };

    jQuery.validator.addMethod("isAfterStartDate", function (value, element) {
        return isAfterStartDate($('#txtStartDate').val(), value);
    }, "End date should be after start date");
    
    if ($(".form-validation").length > 0) {
        $(".form-validation").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                },

                phone: {
                    required: true,
                    minlength: 9,
                    maxlength: 16
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
                alt_email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                },
                dob: {
                    required: true,
                    date: true
                },
                joined: {
                    required: true,
                    date: true,
                },
                left: {
                    required: true,
                    date: true,
                    isAfterStartDate:true
                },
                review: {
                    required: true,
                    date: true,
                },


            },
            messages: {

                name: {
                    required: "Please enter name",
                    maxlength: "Your last name maxlength should be 50 characters long."
                },
                email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },
                phone: {
                    required: "Please enter contact number",
                    minlength: "Please enter valid phone number",
                    digits: "Please enter only numbers"
                },
                alt_email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },
                password: {
                    required: "Please enter Password",
                    maxlength: "Your password should be minimum 8 characters long."
                },
                dob: {
                    required: "Please select Date of Birth",
                    date: "Please select Valid Date format."
                },
                left: {
                    required: "Please select start Date",
                    date: "Please select Valid date",
                },
                joined: {
                    required: "Please select End Date",
                    date: "Please select Valid date",
                },
            },
        })
    }

</script>
@endpush