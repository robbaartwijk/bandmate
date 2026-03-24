<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstrumentRequest extends FormRequest
{
    /**
     * Only admins may update instruments (enforced via InstrumentPolicy::before()).
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('instrument'));
    }

    /**
     * Validation rules for updating an instrument.
     */
    public function rules(): array
    {
        $instrumentId = $this->route('instrument')->id;

        return [
            'name' => ['required', 'string', 'max:255', 'unique:instruments,name,' . $instrumentId],
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