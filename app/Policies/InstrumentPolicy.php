<?php
 
namespace App\Policies;
 
use App\Models\Instrument;
use App\Models\User;
 
class InstrumentPolicy
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
     * Any logged-in user can view the instruments list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can view a single instrument.
     */
    public function view(User $user, Instrument $instrument): bool
    {
        return true;
    }
 
    /**
     * Only admins can create an instrument (handled by before()).
     */
    public function create(User $user): bool
    {
        return false;
    }
 
    /**
     * Only admins can edit an instrument (handled by before()).
     */
    public function update(User $user, Instrument $instrument): bool
    {
        return false;
    }
 
    /**
     * Only admins can delete an instrument (handled by before()).
     */
    public function delete(User $user, Instrument $instrument): bool
    {
        return false;
    }
 
    /**
     * Only admins can restore a soft-deleted instrument (handled by before()).
     */
    public function restore(User $user, Instrument $instrument): bool
    {
        return false;
    }
 
    /**
     * Only admins can permanently delete an instrument (handled by before()).
     */
    public function forceDelete(User $user, Instrument $instrument): bool
    {
        return false;
    }
}
 