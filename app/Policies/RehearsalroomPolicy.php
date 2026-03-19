<?php
 
namespace App\Policies;
 
use App\Models\Rehearsalroom;
use App\Models\User;
 
class RehearsalroomPolicy
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
     * Any logged-in user can view the rehearsal rooms list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can view a single rehearsal room.
     */
    public function view(User $user, Rehearsalroom $rehearsalroom): bool
    {
        return true;
    }
 
    /**
     * Any logged-in user can add a rehearsal room.
     */
    public function create(User $user): bool
    {
        return true;
    }
 
    /**
     * Only the owner of the rehearsal room can edit it.
     */
    public function update(User $user, Rehearsalroom $rehearsalroom): bool
    {
        return $rehearsalroom->user_id === $user->id;
    }
 
    /**
     * Only the owner of the rehearsal room can delete it.
     */
    public function delete(User $user, Rehearsalroom $rehearsalroom): bool
    {
        return $rehearsalroom->user_id === $user->id;
    }
 
    /**
     * Only the owner can restore a soft-deleted rehearsal room.
     */
    public function restore(User $user, Rehearsalroom $rehearsalroom): bool
    {
        return $rehearsalroom->user_id === $user->id;
    }
 
    /**
     * Only the owner can permanently delete a rehearsal room.
     */
    public function forceDelete(User $user, Rehearsalroom $rehearsalroom): bool
    {
        return $rehearsalroom->user_id === $user->id;
    }
}
 