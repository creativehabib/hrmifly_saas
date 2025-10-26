<?php

namespace App\SuperAdmin\Http\Requests\Api\Lang;

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
            'name' => 'required',
            'key' => 'required|not_in:admin|unique:langs,key'

        ];

        return $rules;
    }
}
