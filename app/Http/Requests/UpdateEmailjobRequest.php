<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('email_job'));
    }

    public function rules(): array
    {
        return [
            'template_id'  => ['required', 'integer', 'exists:email_templates,id'],
            'from_address' => ['required', 'email', 'max:255'],
            'from_name'    => ['nullable', 'string', 'max:255'],
            'metadata'     => ['nullable', 'array'],
            'scheduled_at' => ['nullable', 'date', 'after:now'],
        ];
    }

    public function messages(): array
    {
        return [
            'template_id.exists'  => 'The selected email template does not exist.',
            'scheduled_at.after'  => 'The scheduled time must be in the future.',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            // Prevent updating a job that is no longer pending
            $job = $this->route('email_job');

            if ($job->status !== 'pending') {
                $validator->errors()->add('status', 'Only pending jobs can be updated.');
            }
        });
    }
}