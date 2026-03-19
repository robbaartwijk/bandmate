<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Admins can do everything.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->is_admin) {
            return true;
        }

        return null;
    }

    /**
     * Any logged-in user can view the list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Any logged-in user can view a profile.
     */
    public function view(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Only the user themselves (or an admin) can edit their account.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    /**
     * Only admins can delete users (handled by before()).
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }
}