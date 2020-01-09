
$(document).ready(function () {
    
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z, ]+$/i.test(value);
    }, "Letters and spaces only please");

    if ($(".form-validation").length > 0) {
        $(".form-validation").validate({
            rules: {
                name: {
                    required: true,
                    lettersonly: true,
                    minlength: 5,
                    maxlength: 50
                },

                phone: {
                    number: true,
                    minlength: 9,
                    maxlength: 16
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
                alt_email: {
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
                    date: true,
                },
                review: {
                    date: true,
                },
                bank: {
                    lettersonly: true,
                },
                branch: {
                    lettersonly: true,
                },
                cit: {
                    number: true
                },
                acc: {
                    number: true
                },
                pan: {
                    number: true
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
                review: {
                    required: "Please select End Date",
                    date: "Please select Valid date",
                },
                cit: {
                    number: "Please enter numbers only"
                },
                acc: {
                    number: "Please enter numbers only"
                },
                pan: {
                    number: "Please enter numbers only"
                },
            },
        })
    }

})
