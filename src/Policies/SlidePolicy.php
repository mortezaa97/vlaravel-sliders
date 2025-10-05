<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Mortezaa97\Sliders\Models\Slide;

class SlidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Slide $slide)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Slide $slide)
    {
        return $user->id === $slide->create_by || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Slide $slide)
    {
        return $user->id === $slide->create_by || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Slide $slide)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Slide $slide)
    {
        //
    }
}
