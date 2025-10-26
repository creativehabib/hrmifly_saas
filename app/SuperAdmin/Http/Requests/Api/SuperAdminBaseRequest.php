<?php

namespace App\SuperAdmin\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SuperAdminBaseRequest extends FormRequest
{
    // protected function failedValidation(Validator $validator)
    // {
    //     $response = response()->json([
    //         'error' => [
    //             'code' => 200,
    //             'message' => 'The given data was invalid.',
    //             'details' => $validator->errors()
    //         ],
    //         'is_error' => 'yes',
    //     ], 200); // Change the status code to 200

    //     throw new HttpResponseException($response);
    // }
}
