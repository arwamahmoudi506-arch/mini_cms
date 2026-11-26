<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can change the role of the given account.
     */
    public function updateRole(User $user, User $account): bool
    {
        return $user->isAdmin() && $user->id !== $account->id;
    }
}
