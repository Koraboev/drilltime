<?php

namespace App\Policies;

use App\Models\Language;
use App\Models\Menu;
use App\Models\User;

class LanguagePolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Language $language)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Language $language)
    {
        return false;
    }

    public function delete(User $user, Language $language)
    {
        return false;
    }

    public function restore(User $user, Language $language)
    {
        return false;
    }

    public function forceDelete(User $user, Language $language)
    {
        return false;
    }
}
