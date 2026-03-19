<?php
 
namespace App\Policies;
 
use App\Models\User;
use App\Models\EmailJob;
 
class EmailJobPolicy
{
    /**
     * View any job (list view).
     * Admins see all jobs; regular users see only their own.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * View a specific job.
     * Admins can view any; regular users only their own.
     */
    public function view(User $user, EmailJob $emailJob): bool
    {
        return $user->is_admin || $emailJob->created_by === $user->id;
    }
 
    /**
     * Create a new email job (dispatch a single or bulk send).
     */
    public function create(User $user): bool
    {
        return true;
    }
 
    /**
     * Update a job — only allowed if it is still pending.
     */
    public function update(User $user, EmailJob $emailJob): bool
    {
        if ($emailJob->status !== 'pending') {
            return false;
        }
 
        return $user->is_admin || $emailJob->created_by === $user->id;
    }
 
    /**
     * Cancel / delete a job — only allowed if it is still pending.
     */
    public function delete(User $user, EmailJob $emailJob): bool
    {
        if ($emailJob->status !== 'pending') {
            return false;
        }
 
        return $user->is_admin || $emailJob->created_by === $user->id;
    }
}