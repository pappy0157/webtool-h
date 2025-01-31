<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user, User $update_user) {
        if($user->super_admin)
            return Response::allow();

        return !$update_user->admin || $update_user->id === $user->id 
            ? Response::allow()
            : Response::deny('Cannot edit fellow admins unless you are the super admin.');
    }

    public function delete(User $user, User $update_user) {
        if($update_user->id === $user->id)
            return Response::deny('Cannot delete self.');

        if(!$update_user->admin || $user->super_admin) {
            return Response::allow();
        }

        return Response::deny('Not allowed.');
    }
}
