<?php

namespace App\Policies;

use App\User;
use App\shop;
use Illuminate\Auth\Access\HandlesAuthorization;

class shopPolicy
{
    use HandlesAuthorization;


    public function before($user,$ability)
    {
        if($user->is_admin)
        {
            return true;
        }
    }
    /**
     * Determine whether the user can view the shop.
     *
     * @param  \App\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function view(User $user, shop $shop)
    {
        if($user->is_admin)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can create shops.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       
    }

    /**
     * Determine whether the user can update the shop.
     *
     * @param  \App\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function update(User $user, shop $shop)
    {
        //
    }

    /**
     * Determine whether the user can delete the shop.
     *
     * @param  \App\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function delete(User $user, shop $shop)
    {
        //
    }
}
