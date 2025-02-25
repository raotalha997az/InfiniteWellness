<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class CreateDoctorRequest extends FormRequest
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
        $rules = Doctor::$rules;
        $rules['image'] = 'mimes:jpeg,jpg,png';
        $rules['doctor_license'] = 'nullable|mimes:jpeg,jpg,png,pdf,doc,docx|max:5048';

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'image.mimes' => 'The profile image must be a file of type: jpeg, jpg, png.',
            'doctor_license.max' => 'The doctor license file must less than or exceed 5MB in size.',
        ];
    }
}
