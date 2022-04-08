<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCardRequest extends FormRequest
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
            'incoming_number' => 'required|string',
            'name' => 'required|string',
            'status' => 'sometimes|required|string',
            'surname' => 'required|string',
            'patronymic' => 'present|string',
            'birth_date' => 'present|date_format:d/m/Y',
            'delivery_date' => 'required|date_format:d/m/Y',
            'sex' => 'required|string|in:male,female',
            'medical_center' => 'required|integer',
            'department' => 'required|integer',
            'create_by_doctor' => 'present|string',
            'diagnosis' => 'required|string',
            'research_date' => 'required|date_format:d/m/Y',
            'shipment_date' => 'required|date_format:d/m/Y',
            'technician' => 'present|integer',
            'body_part' => 'required|integer',
            'blocks_count' => 'sometimes|required|integer',
            'glasses_count' => 'sometimes|required|integer',
            'research_type' => 'required|integer',
            'appointed_doctor' => 'required|integer',
            'color' => 'required|array',
            'mkb' => 'sometimes|string',
            'mkbonko' => 'sometimes|string',
            'macro_description' => 'required|string',
            'micro_description' => 'required|string',
            'conclusion' => 'required|string',
            'research_area' => 'required|string|in:cit,gist',
        ];

        $userRights = Auth::user()->group();
        $userFields = array_flip(json_decode($userRights->fields, true));

        return array_intersect_key($rules, $userFields);
    }
}
