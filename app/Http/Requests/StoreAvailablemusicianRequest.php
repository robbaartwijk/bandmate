<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvailablemusicianRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\Availablemusician::class);
    }

    public function rules(): array
    {
        return [
            'instrument_id'   => ['required'],
            'genre_id'        => ['required'],
            'description'     => ['nullable', 'string'],
            'available_from'  => ['nullable', 'date'],
            'available_until' => ['nullable', 'date', 'after:available_from'],
        ];
    }
}
