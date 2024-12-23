<?php

namespace App\Policies;

use App\Models\SubMenu;
use App\Models\User;

class SubMenuPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, SubMenu $menu)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, SubMenu $menu)
    {
        return true;
    }

    public function delete(User $user, SubMenu $menu)
    {
        return false;
    }

    public function restore(User $user, SubMenu $menu)
    {
        return true;
    }

    public function forceDelete(User $user, SubMenu $menu)
    {
        return false;
    }
}
