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
            'email'=>'required|email|unique:users,email',
            'gender'=>'required|in:M,F,O',
            'password'=>'required|min:8',
            'alt_email'=>'sometimes|email|unique:users',
            'dob'=>'required|date|date_format:Y-m-d|before:today',
            'joined'=>'required|date_format:Y-m-d|before_or_equal:date|after:dob',
            'left'=>'sometimes|after:joined|nullable',
            'phone'=>'sometimes|nullable|digits_between:9,15',
            'review'=>'sometimes|nullable|after:joined',
            'designation_id'=>'required',
            'pan'=>'sometimes|digits_between:1,10|unique:users,pan',
            'cit'=>'sometimes|digits_between:1,10|unique:users,cit',
            'bank'=>'sometimes|max:55|regex:/^[\pL\s\-]+$/u',
            'acc'=>'sometimes|digits_between:1,20|unique:users,acc',
            'branch'=>'sometimes|regex:/^[\pL\s\-]+$/u',
            'image'=>'sometimes|image',
            'cit_img'=>'sometimes|image|mimes:pdf',
            'citizenship'=>'sometimes|image|mimes:pdf',
            'pan_img'=>'sometimes|image|mimes:pdf',
            'contract'=>'sometimes|mimes:pdf',
            'appointment'=>'sometimes|mimes:pdf'
             
        ];
    }
}
