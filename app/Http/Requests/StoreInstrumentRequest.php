<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstrumentRequest extends FormRequest
{
    /**
     * Only admins may create instruments (enforced via InstrumentPolicy::before()).
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\Instrument::class);
    }

    /**
     * Validation rules for creating an instrument.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:instruments,name'],
            'type' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'An instrument with this name already exists.',
        ];
    }
}