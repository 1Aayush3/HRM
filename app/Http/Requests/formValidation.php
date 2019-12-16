<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:30|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email|unique:users,email',
            'gender'=>'required|in:M,F,O',
            'password'=>'required|min:8',
            'alt_email'=>'email|unique:users',
            'dob'=>'required|date|date_format:Y-m-d|before:today',
            'joined'=>'required|date_format:Y-m-d|before_or_equal:date|after:dob',
            'left'=>'sometimes|date|date_format:Y-m-d|before_or_equal:date|after:joined',
            'phone'=>'required|unique:users|max:20|required|regex:/(01)[0-9]{9}/',
            'review'=>'sometimes|date',
            'designation_id'=>'required',
            'pan'=>'required|min:5|max:55',
            'cit'=>'required|min:5|max:55',
            'bank'=>'required|max:55|regex:/^[\pL\s\-]+$/u',
            'acc'=>'required|unique:users,acc',
            'branch'=>'required|regex:/^[\pL\s\-]+$/u',
            'image'=>'sometimes|image',
            'cit_img'=>'sometimes|image|mimes:pdf,jpeg,jpg,png,gif',
            'citizenship'=>'sometimes|image',
            'pan_img'=>'sometimes|image',
            'contract'=>'sometimes|mimes:pdf',
            'appointment'=>'sometimes|mimes:pdf'
             
        ];
    }
}
