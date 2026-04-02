<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVacancyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('vacancy'));
    }

    public function rules(): array
    {
        return [
            'act_id'        => ['required', Rule::exists('acts', 'id')->where('user_id', auth()->id())],
            'instrument_id' => ['required', 'exists:instruments,id'],
            'description'   => ['nullable', 'string'],
        ];
    }
}
