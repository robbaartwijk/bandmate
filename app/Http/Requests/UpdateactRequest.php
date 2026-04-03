<?php

namespace App\Http\Requests;

use App\Models\Act;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('act'));
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'             => ['required', 'string', 'max:255'],
            'genre_id'         => ['required', 'integer', 'exists:genres,id'],
            'number_of_members'=> ['required', 'integer', 'min:1'],
            'phone'            => ['required', 'string', 'max:50'],
            'email'            => ['required', 'email', 'max:255'],
            'description'      => ['required', 'string'],
            'website'          => ['nullable', 'url', 'max:255'],
            'facebook'         => ['nullable', 'url', 'max:255'],
            'instagram'        => ['nullable', 'url', 'max:255'],
            'twitter'          => ['nullable', 'url', 'max:255'],
            'youtube'          => ['nullable', 'url', 'max:255'],
            'youtubedemo'      => ['nullable', 'url', 'max:255'],
            'soundcloud'       => ['nullable', 'url', 'max:255'],
            'spotify'          => ['nullable', 'url', 'max:255'],
            'bluesky'          => ['nullable', 'url', 'max:255'],
            'actpic'           => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'actpic.max' => 'The photo may not be larger than 2 MB.',
            'actpic.image' => 'The uploaded file must be an image.',
        ];
    }
}
