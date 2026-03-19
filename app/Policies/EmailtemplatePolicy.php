<?php
 
namespace App\Policies;
 
use App\Models\User;
use App\Models\EmailTemplate;
 
class EmailTemplatePolicy
{
    /**
     * View any template (list view).
     */
    public function viewAny(User $user): bool
    {
        return $user->is_admin;
    }
 
    /**
     * View a specific template.
     */
    public function view(User $user, EmailTemplate $emailTemplate): bool
    {
        return $user->is_admin;
    }
 
    /**
     * Create a new template.
     */
    public function create(User $user): bool
    {
        return $user->is_admin;
    }
 
    /**
     * Update an existing template.
     */
    public function update(User $user, EmailTemplate $emailTemplate): bool
    {
        return $user->is_admin;
    }
 
    /**
     * Delete a template (soft delete).
     */
    public function delete(User $user, EmailTemplate $emailTemplate): bool
    {
        return $user->is_admin;
    }
 
    /**
     * Restore a soft-deleted template.
     */
    public function restore(User $user, EmailTemplate $emailTemplate): bool
    {
        return $user->is_admin;
    }
 
    /**
     * Permanently delete a template.
     */
    public function forceDelete(User $user, EmailTemplate $emailTemplate): bool
    {
        return $user->is_admin;
    }
}