<?php
 
namespace App\Policies;
 
use App\Models\Availablemusician;
use App\Models\User;
 
class AvailablemusicianPolicy
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
     * Any logged-in user can view the available musicians list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can view a single available musician.
     */
    public function view(User $user, Availablemusician $availablemusician): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can register themselves as an available musician.
     */
    public function create(User $user): bool
    {
        return true;
    }
 
    /**
     * Only the owner of the listing can edit it.
     */
    public function update(User $user, Availablemusician $availablemusician): bool
    {
        return $availablemusician->user_id === $user->id;
    }
 
    /**
     * Only the owner of the listing can delete it.
     */
    public function delete(User $user, Availablemusician $availablemusician): bool
    {
        return $availablemusician->user_id === $user->id;
    }
 
    /**
     * Only the owner of the listing can restore a soft-deleted record.
     */
    public function restore(User $user, Availablemusician $availablemusician): bool
    {
        return $availablemusician->user_id === $user->id;
    }
 
    /**
     * Only the owner of the listing can permanently delete it.
     */
    public function forceDelete(User $user, Availablemusician $availablemusician): bool
    {
        return $availablemusician->user_id === $user->id;
    }
}
 