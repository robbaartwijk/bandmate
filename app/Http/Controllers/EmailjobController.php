<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\BaseController;

use App\Models\EmailJob;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
 
class EmailJobController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->authorizeResource(EmailJob::class, 'email_job');
    }
 
    /**
     * List all email jobs.
     */
    public function index(): View
    {
        $jobs = EmailJob::with('template')
            ->latest()
            ->paginate(20);
 
        return view('email-jobs.index', compact('jobs'));
    }
 
    /**
     * Show the form to create a new email job.
     */
    public function create(): View
    {
        $templates = EmailTemplate::where('status', 'active')->get();
 
        return view('email-jobs.create', compact('templates'));
    }
 
    /**
     * Store and dispatch a new email job.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'template_id'  => 'required|exists:email_templates,id',
            'type'         => 'required|in:single,bulk',
            'from_address' => 'required|email|max:255',
            'from_name'    => 'nullable|string|max:255',
            'metadata'     => 'nullable|array',
            'scheduled_at' => 'nullable|date|after:now',
 
            // Recipients submitted as an array of rows
            'recipients'              => 'required|array|min:1',
            'recipients.*.email'      => 'required|email|max:255',
            'recipients.*.name'       => 'nullable|string|max:255',
            'recipients.*.variables'  => 'nullable|array',
        ]);
 
        $job = EmailJob::create([
            'template_id'  => $validated['template_id'],
            'type'         => $validated['type'],
            'from_address' => $validated['from_address'],
            'from_name'    => $validated['from_name'] ?? null,
            'metadata'     => $validated['metadata'] ?? null,
            'scheduled_at' => $validated['scheduled_at'] ?? null,
            'status'       => 'pending',
            'created_by'   => auth()->id(),
        ]);
 
        foreach ($validated['recipients'] as $recipient) {
            $job->recipients()->create([
                'email'     => $recipient['email'],
                'name'      => $recipient['name'] ?? null,
                'variables' => $recipient['variables'] ?? null,
            ]);
        }
 
        \App\Jobs\ProcessEmailJob::dispatch($job);
 
        return redirect()->route('email-jobs.show', $job)
            ->with('success', 'Email job created and queued successfully.');
    }
 
    /**
     * Show details and recipient list for a job.
     */
    public function show(EmailJob $emailJob): View
    {
        $emailJob->load('template', 'recipients.log');
 
        return view('email-jobs.show', compact('emailJob'));
    }
 
    /**
     * Show the form to edit a pending job.
     */
    public function edit(EmailJob $emailJob): View
    {
        abort_if($emailJob->status !== 'pending', 403, 'Only pending jobs can be edited.');
 
        $templates = EmailTemplate::where('status', 'active')->get();
 
        return view('email-jobs.edit', compact('emailJob', 'templates'));
    }
 
    /**
     * Update a pending job.
     */
    public function update(Request $request, EmailJob $emailJob): RedirectResponse
    {
        abort_if($emailJob->status !== 'pending', 403, 'Only pending jobs can be updated.');
 
        $validated = $request->validate([
            'template_id'  => 'required|exists:email_templates,id',
            'from_address' => 'required|email|max:255',
            'from_name'    => 'nullable|string|max:255',
            'metadata'     => 'nullable|array',
            'scheduled_at' => 'nullable|date|after:now',
        ]);
 
        $emailJob->update($validated);
 
        return redirect()->route('email-jobs.show', $emailJob)
            ->with('success', 'Email job updated successfully.');
    }
 
    /**
     * Cancel (delete) a pending job.
     */
    public function destroy(EmailJob $emailJob): RedirectResponse
    {
        abort_if($emailJob->status !== 'pending', 403, 'Only pending jobs can be cancelled.');
 
        $emailJob->update(['status' => 'cancelled']);
 
        return redirect()->route('email-jobs.index')
            ->with('success', 'Email job cancelled.');
    }
}