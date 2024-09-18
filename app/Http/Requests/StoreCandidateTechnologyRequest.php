<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCandidateTechnologyRequest extends FormRequest
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
        $candidate = Candidate::where('user_id', '=', Auth::id())->first();
        return [
            'technology_id' => ['required', Rule::unique('candidate_technologies')->where('candidate_id',$candidate->id)

            ]
        ];
    }
}
