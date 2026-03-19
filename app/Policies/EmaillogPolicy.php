<?php
 
namespace App\Policies;
 
use App\Models\User;
use App\Models\EmailLog;
 
class EmailLogPolicy
{
    /**
     * View any log entry (list view).
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * View a specific log entry.
     * Admins see all; users only see logs for their own jobs.
     */
    public function view(User $user, EmailLog $emailLog): bool
    {
        return $user->is_admin || $emailLog->recipient->job->created_by === $user->id;
    }
 
    /**
     * Logs are created by the system only — no user should create them directly.
     */
    public function create(User $user): bool
    {
        return false;
    }
 
    /**
     * Logs are immutable — updates come from provider webhooks only.
     */
    public function update(User $user, EmailLog $emailLog): bool
    {
        return false;
    }
 
    /**
     * Only admins may delete log entries.
     */
    public function delete(User $user, EmailLog $emailLog): bool
    {
        return $user->is_admin;
    }
}