<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FromRequest_Agency extends FormRequest
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
            'agent_number'=>'required|numeric|unique:agencies',
            'name'=>'required|string',
            'phone'=>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'email'=>'required|email',
            'address'=>'required|string',
            'manager_name'=>'required|string',
        ];
    }
    public function messages()
    {
        return [
            'agent_number.unique'=>'Mã đại lý đã tồn tại',
            'agent_number.required'=>'Agent Number is required',
            'name.required'=>'Name is required',
            'phone.required'=>'Phone is required',
            'email.required'=>'Email is required',
            'address.required'=>'Address is required',
            'manager_name.required'=>'Manager Name is required',
        ];
    }
}
