<?php

namespace App\SuperAdmin\Http\Requests\Api\Settings;

use App\SuperAdmin\Http\Requests\Api\SuperAdminBaseRequest;

class TestEmailRequest extends SuperAdminBaseRequest
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
			'email'    => 'required|email',
		];

		return $rules;
	}
}
