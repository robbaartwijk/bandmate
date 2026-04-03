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
            'address'          => ['nullable', 'string', 'max:255'],
            'zip'              => ['nullable', 'string', 'max:20'],
            'city'             => ['required', 'string', 'max:255'],
            'country'          => ['required', 'string', 'max:255'],
            'price'            => ['nullable', 'numeric', 'min:0'],
            'description'      => ['nullable', 'string'],
            'phone'            => ['nullable', 'string', 'max:30'],
            'email'            => ['nullable', 'email'],
            'website'          => ['nullable', 'url'],
            'rehearsalroompic' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'rehearsalroompic.max' => 'The photo may not be larger than 4 MB.',
            'rehearsalroompic.image' => 'The uploaded file must be an image.',
        ];
    }
}
