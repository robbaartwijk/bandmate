<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;
use App\Models\EmailJob;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailLogController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(EmailLog::class, 'email_log');
    }

    /**
     * List all logs, optionally filtered by job.
     */
    public function index(Request $request): View
    {
        $logs = EmailLog::with('recipient.job.template')
            ->when($request->job_id, fn($q) => $q->whereHas(
                'recipient', fn($q) => $q->where('job_id', $request->job_id)
            ))
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->latest('created_at')
            ->paginate(50);

        $jobs = EmailJob::latest()->get();

        return view('email-logs.index', compact('logs', 'jobs'));
    }

    /**
     * Show a single log entry.
     */
    public function show(EmailLog $emailLog): View
    {
        $emailLog->load('recipient.job.template');

        return view('email-logs.show', compact('emailLog'));
    }

    /**
     * Logs cannot be manually created.
     */
    public function create(): never
    {
        abort(403, 'Logs are created by the system only.');
    }

    public function store(): never
    {
        abort(403, 'Logs are created by the system only.');
    }

    /**
     * Logs cannot be manually edited.
     */
    public function edit(): never
    {
        abort(403, 'Logs are immutable.');
    }

    public function update(): never
    {
        abort(403, 'Logs are immutable.');
    }

    /**
     * Admins may delete a log entry.
     */
    public function destroy(EmailLog $emailLog): \Illuminate\Http\RedirectResponse
    {
        $emailLog->delete();

        return redirect()->route('email-logs.index')
            ->with('success', 'Log entry deleted.');
    }
}