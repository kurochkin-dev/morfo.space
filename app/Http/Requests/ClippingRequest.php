<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClippingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'status' => 'sometimes|required|string',
            'research_date' => 'required|date_format:d/m/Y',
            'technician' => 'present|integer',
            'body_part' => 'required|integer',
            'blocks_count' => 'sometimes|required|integer',
            'glasses_count' => 'sometimes|required|integer',
            'research_type' => 'required|integer',
            'appointed_doctor' => 'required|integer',
            'color' => 'required|array',
        ];

        $userRights = Auth::user()->group();
        $userFields = array_flip(json_decode($userRights->fields, true));

        return array_intersect_key($rules, array_merge($userFields, ['status' => 0]));
    }
}
