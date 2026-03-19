<?php
 
namespace App\Policies;
 
use App\Models\Act;
use App\Models\User;
 
class ActPolicy
{
    /**
     * Admins can do everything — this runs before all other checks.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->is_admin) {
            return true;
        }
 
        return null; // Fall through to the individual method checks below
    }
 
    /**
     * Any logged-in user can view the acts list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can view a single act.
     */
    public function view(User $user, Act $act): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can create an act.
     */
    public function create(User $user): bool
    {
        return true;
    }
 
    /**
     * Only the act's owner can edit it.
     */
    public function update(User $user, Act $act): bool
    {
        return $act->user_id === $user->id;
    }
 
    /**
     * Only the act's owner can delete it.
     */
    public function delete(User $user, Act $act): bool
    {
        return $act->user_id === $user->id;
    }
 
    /**
     * Only the act's owner can restore a soft-deleted act.
     */
    public function restore(User $user, Act $act): bool
    {
        return $act->user_id === $user->id;
    }
 
    /**
     * Only the act's owner can permanently delete an act.
     */
    public function forceDelete(User $user, Act $act): bool
    {
        return $act->user_id === $user->id;
    }
}
 