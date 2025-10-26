<?php

namespace App\SuperAdmin\Http\Requests\Api\OfflineRequest;

use App\SuperAdmin\Http\Requests\Api\SuperAdminBaseRequest;

class RejectOfllineRequest extends SuperAdminBaseRequest
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
            'offline_request_id' => 'required',
        ];
    }
}
