<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class formValidation extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'=>'required|min:5|max:30|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email|unique:users,email,'.$this->employee,
            'gender'=>'required|in:M,F,O',
            'dob'=>'required|date|date_format:Y-m-d|before:today',
            'joined'=>'required|date_format:Y-m-d|before_or_equal:date|after:dob',
            'password'=>'required_unless:_method,PUT|min:8|max:20|nullable',
            'designation_id'=>'required',

            'alt_email'=>'sometimes|nullable|email|unique:users,alt_email,'.$this->employee,
            'left'=>'sometimes|after:joined|nullable',
            'phone'=>'sometimes|nullable|numeric|digits_between:9,15',
            'review'=>'sometimes|nullable|after:joined',
            'pan'=>'sometimes|numeric|digits_between:1,10|unique:users,pan,'.$this->employee.'|nullable',
            'cit'=>'sometimes|numeric|digits_between:1,10|unique:users,cit,'.$this->employee.'|nullable',
            'bank'=>'sometimes|max:55|regex:/^[\pL\s\-]+$/u|nullable',
            'acc'=>'sometimes|numeric|digits_between:1,20|unique:users,acc,'.$this->employee.'|nullable',
            'branch'=>'sometimes|max:55|regex:/^[\pL\s\-]+$/u|nullable',
            'image'=>'sometimes|image|nullable',
            'cit_img'=>'sometimes|mimes:jpeg,bmp,png,gif,svg,pdf|nullable',
            'citizenship'=>'sometimes|mimes:jpeg,bmp,png,gif,svg,pdf|nullable',
            'pan_img'=>'sometimes|mimes:jpeg,bmp,png,gif,svg,pdf|nullable',
            'contract'=>'sometimes|mimes:pdf|nullable',
            'appointment'=>'sometimes|mimes:pdf|nullable'
        ];
    }
    
    public function messages()
    {
    return [
        'password.required_unless' => 'Please enter password.',
        
];
}
}