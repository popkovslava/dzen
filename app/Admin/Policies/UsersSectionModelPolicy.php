<?php

namespace App\Admin\Policies;

use App\Models\User;
use App\Admin\Http\Sections\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersSectionModelPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability, Users $section, User $item = null)
    {
        if ($user->isSuperAdmin()) {
            /*if ($ability != 'display' && $ability != 'create' && !is_null($item) && $item->id <= 2) {
                return false;
            }*/

            return true;
        }
        return false;
    }

    public function display(User $user, Users $section, User $item)
    {
        return true;
    }

    public function edit(User $user, Users $section, User $item)
    {
        // return $item->id === $user->id || $user->id < 2;
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, Users $model, User $item)
    {
        // return $item->id === $user->id || $item->id < 2;
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // return $user->id < 2;
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, Users $model)
    {
        // return $item->id === $user->id || $user->id < 2;
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, Users $section, User $item)
    {
        // return $item->id === $user->id || $user->id < 2;
        return true;
    }
}
