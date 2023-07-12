<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProposalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'speaker.name' => 'required|min:2|max:255',
            'speaker.email' => 'required|email',
            'speaker.bio' => 'required|min:10',
            'proposal.*.title' => 'required|min:3|max:255',
            'proposal.*.abstract' => 'required|min:3|max:255',
            'proposal.*.preferred_time_slot' => 'required|date_format:Y-m-d H:i:s',
        ];
    }
}
