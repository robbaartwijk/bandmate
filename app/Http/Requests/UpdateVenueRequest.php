<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVenueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('venue'));
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'city'     => ['required', 'string', 'max:255'],
            'country'  => ['required', 'string', 'max:255'],
            'capacity'    => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'website'     => ['nullable', 'url'],
            'phone'    => ['nullable', 'regex:/^([0-9\s\-\+\(\)]+)$/', 'min:10'],
            'email'    => ['nullable', 'email'],
            'venuepic' => ['nullable', 'image', 'max:4096'],
        ];
    }
}