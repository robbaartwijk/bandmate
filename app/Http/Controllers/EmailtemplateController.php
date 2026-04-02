<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreEmailTemplateRequest;
use App\Http\Requests\UpdateEmailTemplateRequest;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
 
class EmailTemplateController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
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
    public function store(StoreEmailTemplateRequest $request): RedirectResponse
    {
        EmailTemplate::create($request->validated());
 
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
    public function update(UpdateEmailTemplateRequest $request, EmailTemplate $emailTemplate): RedirectResponse
    {
        $emailTemplate->update($request->validated());
 
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