<?php

namespace App\SuperAdmin\Http\Requests\Api\Company;

use Illuminate\Validation\Rule;
use App\SuperAdmin\Http\Requests\Api\SuperAdminBaseRequest;

class StoreRequest extends SuperAdminBaseRequest
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
            'name'    => 'required',
            'short_name'    => 'required',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'required|numeric|unique:companies,phone',
            'timezone' => 'required',
            'status' => 'required',
            'user_email'    => [
                'required', 'email',
                Rule::unique('users', 'email')->where(function ($query) {
                    return $query->where('user_type', 'staff_members')
                        ->orWhere('user_type', 'super_admins');
                })
            ],
            'user_password' => 'required',
        ];

        return $rules;
    }
}
