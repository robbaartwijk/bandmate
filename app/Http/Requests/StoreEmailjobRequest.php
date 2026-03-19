<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class StoreEmailJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\EmailJob::class);
    }
 
    public function rules(): array
    {
        return [
            'template_id'             => ['required', 'integer', 'exists:email_templates,id'],
            'type'                    => ['required', 'in:single,bulk'],
            'from_address'            => ['required', 'email', 'max:255'],
            'from_name'               => ['nullable', 'string', 'max:255'],
            'metadata'                => ['nullable', 'array'],
            'scheduled_at'            => ['nullable', 'date', 'after:now'],
 
            // Recipients
            'recipients'              => ['required', 'array', 'min:1'],
            'recipients.*.email'      => ['required', 'email', 'max:255'],
            'recipients.*.name'       => ['nullable', 'string', 'max:255'],
            'recipients.*.variables'  => ['nullable', 'array'],
        ];
    }
 
    public function messages(): array
    {
        return [
            'template_id.exists'          => 'The selected email template does not exist.',
            'recipients.required'         => 'At least one recipient is required.',
            'recipients.*.email.required' => 'Each recipient must have a valid email address.',
            'recipients.*.email.email'    => 'One or more recipient email addresses are invalid.',
            'scheduled_at.after'          => 'The scheduled time must be in the future.',
        ];
    }
 
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            // If type is "single", enforce exactly one recipient
            if ($this->input('type') === 'single' && count($this->input('recipients', [])) > 1) {
                $validator->errors()->add('recipients', 'A single email job can only have one recipient.');
            }
        });
    }
}
 