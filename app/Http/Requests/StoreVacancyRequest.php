<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreVacancyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\Vacancy::class);
    }

    public function rules(): array
    {
        return [
            'act_id' => [
                'required',
                Rule::exists('acts', 'id')->where('user_id', auth()->id()),
            ],
            'instrument_id' => ['required'],
            'description'   => ['nullable', 'string'],
        ];
    }
}
