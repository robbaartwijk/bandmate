<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGenreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('genre'));
    }

    public function rules(): array
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'max:255'],
        ];
    }
}
