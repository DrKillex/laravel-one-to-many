<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'max:50',
                Rule::unique('records')->ignore($this->record),
                'string'
            ],
            'creation_date' => 'date|required',
            'record_description' => 'required',
            'completed' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
            'delete_image' => 'boolean'
        ];
    }
}
