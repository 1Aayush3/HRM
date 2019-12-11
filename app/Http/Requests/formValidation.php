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
            'name'=>'required|regex:/^[a-zA-Z]+$/u|max:55',
            // 'email'=>'required|unique:users,email',
            // 'gender'=>'required|in:M,N,O',
            // 'password'=>'required|min:8',
            // 'password_confirm' => 'required|same:password',
            // 'alt_email'=>'unique:users',
            // 'dob'=>'required|date|date_format:Y-m-d|before:today',
            // 'joined'=>'required|date_format:Y-m-d|after:today',
            // 'left'=>'sometimes|date',
            // 'phone'=>'required',
            // 'review'=>'sometimes|date',
            // 'designation_id'=>'required',
            // 'pan'=>'required',
            // 'cit'=>'required',
            // 'bank'=>'required',
            // 'acc'=>'required|unique:users,acc',
            // 'branch'=>'required',
            // 'image'=>'sometimes|image',
            // 'cit_img'=>'sometimes|image',
            // 'citizenship'=>'sometimes|image',
            // 'pan_img'=>'sometimes|image',
            // 'contract'=>'sometimes|mimes:pdf',
            // 'appointment'=>'sometimes|mimes:pdf'
             
        ];
    }
}
