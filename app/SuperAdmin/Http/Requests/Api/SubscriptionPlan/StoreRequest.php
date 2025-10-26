<?php

namespace App\SuperAdmin\Http\Requests\Api\SubscriptionPlan;

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
            'description'    => 'required',
            'max_users'    => 'required|integer',
            'annual_price'    => 'required',
            'monthly_price'    => 'required',
        ];

        return $rules;
    }
}
