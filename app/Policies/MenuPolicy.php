<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Menu;

class MenuPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Menu $menu)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Menu $menu)
    {
        return false;
    }

    public function delete(User $user, Menu $menu)
    {
        return false;
    }

    public function restore(User $user, Menu $menu)
    {
        return false;
    }

    public function forceDelete(User $user, Menu $menu)
    {
        return false;
    }
}
