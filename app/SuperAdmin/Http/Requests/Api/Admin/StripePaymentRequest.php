<?php

namespace App\SuperAdmin\Http\Requests\Api\Admin;

use App\SuperAdmin\Http\Requests\Api\SuperAdminBaseRequest;

class StripePaymentRequest extends SuperAdminBaseRequest
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
            'stripe_token' => 'required',
            'plan_id' => 'required',
            'plan_type' => 'required',
            'email' => 'required|email|exists:companies,email'
        ];

        return $rules;
    }
}
