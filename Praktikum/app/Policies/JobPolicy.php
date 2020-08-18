<?php

namespace App\Policies;

use App\User;
use App\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
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
    public function view(User $user, Job $job)
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
    public function update(User $user, Job $job)
    {
        return $user->id == $job->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\odel:Job  $odel:Job
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
        return $user->id == $job->user_id;
    }


}
