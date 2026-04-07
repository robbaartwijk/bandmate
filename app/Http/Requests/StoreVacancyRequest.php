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
                auth()->user()->is_admin
                    ? Rule::exists('acts', 'id')->whereNull('deleted_at')
                    : Rule::exists('acts', 'id')->where('user_id', auth()->id())->whereNull('deleted_at'),
            ],
            'instrument_id' => ['required', 'exists:instruments,id'],
            'description'   => ['nullable', 'string'],
            'city'          => ['nullable', 'string', 'max:255'],
            'country'       => ['nullable', 'string', 'max:255'],
            'vacancypic'    => ['nullable', 'image', 'max:4096'],
        ];
    }
}