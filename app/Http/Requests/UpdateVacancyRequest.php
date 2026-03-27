<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVacancyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('vacancy'));
    }

    public function rules(): array
    {
        return [
            'act_id'        => ['required'],
            'instrument_id' => ['required'],
            'description'   => ['nullable', 'string'],
        ];
    }
}
