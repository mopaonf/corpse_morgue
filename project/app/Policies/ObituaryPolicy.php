<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Obituary;
use Illuminate\Auth\Access\HandlesAuthorization;

class ObituaryPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true; // Allow all authenticated users to create
    }

    public function update(User $user, Obituary $obituary)
    {
        return $user->id === $obituary->user_id;
    }

    public function delete(User $user, Obituary $obituary)
    {
        return $user->id === $obituary->user_id;
    }
}
