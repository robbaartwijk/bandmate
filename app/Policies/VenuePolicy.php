<?php
 
namespace App\Policies;
 
use App\Models\Venue;
use App\Models\User;
 
class VenuePolicy
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
     * Any logged-in user can view the venues list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can view a single venue.
     */
    public function view(User $user, Venue $venue): bool
    {
        return true;
    }
 
    /**
     * Only admins can create a venue (handled by before()).
     */
    public function create(User $user): bool
    {
        return false;
    }
 
    /**
     * Only admins can edit a venue (handled by before()).
     */
    public function update(User $user, Venue $venue): bool
    {
        return false;
    }
 
    /**
     * Only admins can delete a venue (handled by before()).
     */
    public function delete(User $user, Venue $venue): bool
    {
        return false;
    }
 
    /**
     * Only admins can restore a soft-deleted venue (handled by before()).
     */
    public function restore(User $user, Venue $venue): bool
    {
        return false;
    }
 
    /**
     * Only admins can permanently delete a venue (handled by before()).
     */
    public function forceDelete(User $user, Venue $venue): bool
    {
        return false;
    }
}
 