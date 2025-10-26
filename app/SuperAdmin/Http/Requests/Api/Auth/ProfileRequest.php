<?php

namespace App\SuperAdmin\Http\Requests\Api\Auth;

use App\SuperAdmin\Http\Requests\Api\SuperAdminBaseRequest;

class ProfileRequest extends SuperAdminBaseRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'integer',
        ];

        if ($this->has('password') && $this->password != '') {
            $rules['password'] = 'min:8';
        }

        return $rules;
    }
}
