<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    // Admin role Authorization - Admin can perfom all abilities
    public function before(?User $user, $ability){
        if($user?->is_admin){
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Listing $listing): bool
    {
        return true;
        
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): bool
    {
        // allow only the owner of the listing to update the listing
        return $user->id == $listing->by_user_id;
       
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing): bool
    {
        // allow only the owner of the listing to delete the listing
        return $user->id == $listing->by_user_id;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): bool
    {
        // allow only the owner of the listing to restore the listing
        return $user->id == $listing->by_user_id;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        // allow only the owner of the listing to permanently deleting the listing
        return $user->id == $listing->by_user_id;

    }
}
