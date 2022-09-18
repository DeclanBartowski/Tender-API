<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenderRequest extends FormRequest
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
            'external_id' => 'required|integer|unique:tenders',
            'number' => 'required|string',
            'status' => 'required|string',
            'name' => 'required|string',
            'date' => 'required|date',
        ];
    }
}
