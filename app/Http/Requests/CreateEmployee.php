<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployee extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_id' => 'required',
            'fname' => 'required|min:5|max:255',
            'lname' => 'required|min:5|max:255',
            'phone' => 'required|digits:10|numeric',
            'email' => 'required|email:rfc,dns'
        ];
    }
}
