<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\Venue::class);
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'city'     => ['required', 'string', 'max:255'],
            'country'  => ['required', 'string', 'max:255'],
            'capacity' => ['nullable', 'integer', 'min:0'],
            'website'  => ['nullable', 'url'],
            'phone'    => ['nullable', 'regex:/^([0-9\s\-\+\(\)]+)$/', 'min:10'],
            'email'    => ['nullable', 'email'],
            'venuepic' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
