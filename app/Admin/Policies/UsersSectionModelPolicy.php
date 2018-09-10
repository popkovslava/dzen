<?php

namespace App\Admin\Policies;

use App\Models\User;
use App\Admin\Http\Sections\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersSectionModelPolicy
{
    use HandlesAuthorization;

    /**
     * @param User   $user
     * @param string $ability
     *
     * @return bool
     */
    public function before(User $user, $ability, Users $item)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function display(User $user, Users $section, User $item)
    {
        return true;
    }

    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function create(User $user, Users $item)
    {
        if ($user->isSuperAdmin()) {
            return $item->isAutoredBy($user);
        }
    }

    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function edit(User $user, Users $item)
    {
       return true;
    }

    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function delete(User $user, Users $item)
    {
        if ($user->isSuperAdmin()) {
            return $item->isAutoredBy($user);
        }
    }

    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function restore(User $user, Users $item)
    {
        if ($user->isSuperAdmin()) {
            return $item->isAutoredBy($user);
        }
    }
}
