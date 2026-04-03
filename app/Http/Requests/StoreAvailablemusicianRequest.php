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
            'instrument_id'        => ['required', 'exists:instruments,id'],
            'genre_id'             => ['required', 'exists:genres,id'],
            'address'              => ['nullable', 'string', 'max:100'],
            'zip'                  => ['nullable', 'string', 'max:10'],
            'city'                 => ['nullable', 'string', 'max:100'],
            'country'              => ['nullable', 'string', 'max:100'],
            'description'          => ['nullable', 'string'],
            'available_from'       => ['nullable', 'date'],
            'available_until'      => ['nullable', 'date', 'after:available_from'],
            'availablemusicianpic' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'availablemusicianpic.max' => 'The photo may not be larger than 2 MB.',
            'availablemusicianpic.image' => 'The uploaded file must be an image.',
        ];
    }
}
