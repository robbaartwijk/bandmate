<?php
 
namespace App\Policies;
 
use App\Models\User;
use App\Models\EmailJobRecipient;
 
class EmailJobRecipientPolicy
{
    /**
     * View any recipient list.
     * Tied to the parent job — admins see all, users see their own jobs' recipients.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * View a specific recipient record.
     */
    public function view(User $user, EmailJobRecipient $recipient): bool
    {
        return $user->is_admin || $recipient->job->created_by === $user->id;
    }
 
    /**
     * Add recipients to a job — only if the job is still pending.
     */
    public function create(User $user): bool
    {
        return true;
    }
 
    /**
     * Update a recipient — only if the parent job is still pending.
     */
    public function update(User $user, EmailJobRecipient $recipient): bool
    {
        if ($recipient->job->status !== 'pending') {
            return false;
        }
 
        return $user->is_admin || $recipient->job->created_by === $user->id;
    }
 
    /**
     * Delete a recipient — only if the parent job is still pending.
     */
    public function delete(User $user, EmailJobRecipient $recipient): bool
    {
        if ($recipient->job->status !== 'pending') {
            return false;
        }
 
        return $user->is_admin || $recipient->job->created_by === $user->id;
    }
}