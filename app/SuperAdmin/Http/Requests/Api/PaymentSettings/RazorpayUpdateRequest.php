<?php

namespace App\SuperAdmin\Http\Requests\Api\PaymentSettings;

use App\SuperAdmin\Http\Requests\Api\SuperAdminBaseRequest;

class RazorpayUpdateRequest extends SuperAdminBaseRequest
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
			'razorpay_key'    => 'required',
			'razorpay_secret'    => 'required',
			'razorpay_webhook_secret'    => 'required',
			'razorpay_status'    => 'required',
		];

		return $rules;
	}
}
