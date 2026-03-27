<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\Vacancy::class);
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
