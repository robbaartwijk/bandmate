<?php
 
namespace App\Http\Controllers;
 
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
 
class EmailTemplateController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(EmailTemplate::class, 'email_template');
    }
 
    /**
     * List all templates.
     */
    public function index(): View
    {
        $templates = EmailTemplate::latest()->paginate(20);
 
        return view('email-templates.index', compact('templates'));
    }
 
    /**
     * Show the form to create a new template.
     */
    public function create(): View
    {
        return view('email-templates.create');
    }
 
    /**
     * Store a new template.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255|unique:email_templates,name',
            'subject'   => 'required|string|max:255',
            'body_html' => 'required|string',
            'body_text' => 'nullable|string',
            'status'    => 'required|in:active,inactive,draft',
        ]);
 
        EmailTemplate::create($validated);
 
        return redirect()->route('email-templates.index')
            ->with('success', 'Template created successfully.');
    }
 
    /**
     * Show a single template.
     */
    public function show(EmailTemplate $emailTemplate): View
    {
        return view('email-templates.show', compact('emailTemplate'));
    }
 
    /**
     * Show the form to edit a template.
     */
    public function edit(EmailTemplate $emailTemplate): View
    {
        return view('email-templates.edit', compact('emailTemplate'));
    }
 
    /**
     * Update an existing template.
     */
    public function update(Request $request, EmailTemplate $emailTemplate): RedirectResponse
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255|unique:email_templates,name,' . $emailTemplate->id,
            'subject'   => 'required|string|max:255',
            'body_html' => 'required|string',
            'body_text' => 'nullable|string',
            'status'    => 'required|in:active,inactive,draft',
        ]);
 
        $emailTemplate->update($validated);
 
        return redirect()->route('email-templates.index')
            ->with('success', 'Template updated successfully.');
    }
 
    /**
     * Soft-delete a template.
     */
    public function destroy(EmailTemplate $emailTemplate): RedirectResponse
    {
        $emailTemplate->delete();
 
        return redirect()->route('email-templates.index')
            ->with('success', 'Template deleted successfully.');
    }
}