<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\Agency::class);
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'city'        => ['required', 'string', 'max:255'],
            'country'     => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'address'     => ['nullable', 'string'],
            'zip'         => ['nullable', 'string'],
            'state'       => ['nullable', 'string'],
            'phone'       => ['nullable', 'string'],
            'email'       => ['nullable', 'email'],
            'website'     => ['nullable', 'url'],
            'facebook'    => ['nullable', 'url'],
            'twitter'     => ['nullable', 'url'],
            'instagram'   => ['nullable', 'url'],
            'youtube'     => ['nullable', 'url'],
            'soundcloud'  => ['nullable', 'url'],
            'spotify'     => ['nullable', 'url'],
        ];
    }
}
