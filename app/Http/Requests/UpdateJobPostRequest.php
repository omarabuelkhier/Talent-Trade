<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string','min:3', 'max:255'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'salary' => ['required', 'integer', 'min:3'],
            'location' => ['required', 'string', 'min:3', 'max:255'],
            'dead_line' => ['required', 'date', 'min:3', 'max:255'],
            'technology_id' => ['required','array','min:1'],

        ];
    }
}
