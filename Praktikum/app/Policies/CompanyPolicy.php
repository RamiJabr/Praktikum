<?php

namespace App\Policies;

use App\User;
use App\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\odel:Job  $odel:Job
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        //user is allowed to view
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->user() != null;
        //user is allowed to create
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\odel:Job  $odel:Job
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        return $user->id == $company->creator;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\odel:Job  $odel:Job
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        return $user->id == $company->creator;
    }


}
