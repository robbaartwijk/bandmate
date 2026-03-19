<?php
 
namespace App\Policies;
 
use App\Models\Agency;
use App\Models\User;
 
class AgencyPolicy
{
    /**
     * Admins can do everything — this runs before all other checks.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->is_admin) {
            return true;
        }
 
        return null;
    }
 
    /**
     * Any logged-in user can view the agencies list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can view a single agency.
     */
    public function view(User $user, Agency $agency): bool
    {
        return true;
    }
 
    /**
     * Only admins can create an agency (handled by before()).
     */
    public function create(User $user): bool
    {
        return false;
    }
 
    /**
     * Only admins can edit an agency (handled by before()).
     */
    public function update(User $user, Agency $agency): bool
    {
        return false;
    }
 
    /**
     * Only admins can delete an agency (handled by before()).
     */
    public function delete(User $user, Agency $agency): bool
    {
        return false;
    }
 
    /**
     * Only admins can restore a soft-deleted agency (handled by before()).
     */
    public function restore(User $user, Agency $agency): bool
    {
        return false;
    }
 
    /**
     * Only admins can permanently delete an agency (handled by before()).
     */
    public function forceDelete(User $user, Agency $agency): bool
    {
        return false;
    }
}
 