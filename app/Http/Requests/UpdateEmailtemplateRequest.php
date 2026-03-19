<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class UpdateEmailTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('email_template'));
    }
 
    public function rules(): array
    {
        $templateId = $this->route('email_template')->id;
 
        return [
            'name'      => ['required', 'string', 'max:255', 'unique:email_templates,name,' . $templateId],
            'subject'   => ['required', 'string', 'max:255'],
            'body_html' => ['required', 'string'],
            'body_text' => ['nullable', 'string'],
            'status'    => ['required', 'in:active,inactive,draft'],
        ];
    }
 
    public function messages(): array
    {
        return [
            'name.unique'        => 'A template with this name already exists.',
            'body_html.required' => 'The HTML body cannot be empty.',
        ];
    }
}
 