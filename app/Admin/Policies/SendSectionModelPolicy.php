<?php

namespace App\Admin\Policies;

use App\Models\User;
use App\Admin\Http\Sections\Send as Sends;
use App\Models\Send;
use Illuminate\Auth\Access\HandlesAuthorization;

class SendSectionModelPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability, Sends $section, Send $item)
    {
        /*if ($user->isSuperAdmin()) {
            if ($ability != 'display' && $ability != 'create') {
                return false;
            }

            return true;
        }*/
        return true;
    }

    /**
     * @param User $user
     * @param Sends $section
     * @param Send $item
     * @return bool
     */
    public function display(User $user, Sends $section, Send $item)
    {
       //return $user->isSuperAdmin();
    }

    /**
     * @param User $user
     * @param Sends $section
     * @param Send $item
     * @return bool
     */
    public function edit(User $user, Sends $section, Send $item)
    {
        // return $item->id > 2;
    }

    /**
     * @param User $user
     * @param Sends $section
     * @param Send $item
     * @return bool
     */
    public function delete(User $user, Sends $section, Send $item)
    {
       // return $item->id > 2;
    }
}
