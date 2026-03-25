<?php

namespace App\Policies;

use App\Models\Genre;
use App\Models\User;

class GenrePolicy
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
     * Any logged-in user can view the genres list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Any logged-in user can view a single genre.
     */
    public function view(User $user, Genre $genre): bool
    {
        return true;
    }

    /**
     * Only admins can create a genre (handled by before()).
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Only admins can edit a genre (handled by before()).
     */
    public function update(User $user, Genre $genre): bool
    {
        return false;
    }

    /**
     * Only admins can delete a genre (handled by before()).
     */
    public function delete(User $user, Genre $genre): bool
    {
        return false;
    }

    /**
     * Only admins can restore a soft-deleted genre (handled by before()).
     */
    public function restore(User $user, Genre $genre): bool
    {
        return false;
    }

    /**
     * Only admins can permanently delete a genre (handled by before()).
     */
    public function forceDelete(User $user, Genre $genre): bool
    {
        return false;
    }
}