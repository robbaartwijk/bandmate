<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRehearsalroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('rehearsalroom'));
    }

    public function rules(): array
    {
        return [
            'name'             => ['required', 'string', 'max:255'],
            'city'             => ['required', 'string', 'max:255'],
            'country'          => ['required', 'string', 'max:255'],
            'price'            => ['nullable', 'numeric', 'min:0'],
            'phone'            => ['nullable', 'string', 'max:30'],
            'email'            => ['nullable', 'email'],
            'website'          => ['nullable', 'url'],
            'rehearsalroompic' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
