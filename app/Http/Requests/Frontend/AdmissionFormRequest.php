<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admissions,email',
            'gender' => 'required|in:0,1,2',
            'age' => 'required|integer|min:1',
            'address' => 'required|string',
            'mark_sheet' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // Adjust max file size as needed
            'terms_and_conditions' => 'required|accepted',
            'latitude' => 'bail|required',
            'longitude' => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'mark_sheet.mimes' => 'The mark sheet must be a PDF, JPG, JPEG, or PNG file.',
            'mark_sheet.max' => 'The mark sheet may not be greater than 2 MB.', // Adjust message as needed
            'latitude.required' => 'Enable browser location and try again to get gps values.',
        ];
    }
}
