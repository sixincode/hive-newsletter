<?php

namespace Sixincode\HiveNewsletter\Traits;

use Illuminate\Database\Eloquent\Model;
use Sixincode\HiveHelpers\Traits as HelperTraits;
use Illuminate\Database\Eloquent\Relations\HasMany;

abstract class IsNewsletter extends Model
{
  use HelperTraits\HasOwnerTrait;

  public function owner()
  {
      return $this->getOwner();
  }

  public function allUsers()
  {
      return $this->users->merge([$this->owner]);
  }

  public function subscriptions():HasMany
  {
      return $this->hasMany( NewsletterSubscription::class, 'newsletter_id', 'id')
                  ->withPivot('email_verified_at','properties')
                  ->withTimestamps();
  }

  public function invitations():HasMany
  {
      return $this->hasMany( NewsletterInvitation::class, 'newsletter_id', 'id')
                  ->withPivot('email')
                  ->withTimestamps();
  }

  public function users()
  {
      return $this->belongsToMany(User::class, NewsletterSubscription::class, 'newsletter_id', 'email')
                  ->withPivot('email_verified_at','properties')
                  ->withTimestamps()
                  ->as('membership');
  }

  public function hasUser($user)
  {
      return $this->users->contains($user) || $user->ownsNewsletter($this);
  }

  public function hasUserWithEmail(string $email)
  {
      return $this->allUsers()->contains(function ($user) use ($email) {
          return $user->email === $email;
      });
  }

    /**
   * Determine if the given user has the given permission on the team.
   *
   * @param  \App\Models\User  $user
   * @param  string  $permission
   * @return bool
   */
  // public function userHasPermission($user, $permission)
  // {
  //     return $user->hasTeamPermission($this, $permission);
  // }

  public function newsletterInvitations()
  {
      return $this->hasMany(NewsletterInvitation::class, 'newsletter_id', 'id');
  }

  public function removeUser($user)
  {
      // if ($user->current_team_id === $this->id) {
      //     $user->forceFill([
      //         'current_team_id' => null,
      //     ])->save();
      // }

      $this->users()->detach($user);
  }

  public function purge()
  {
      // $this->owner()->where('current_team_id', $this->id)
      //         ->update(['current_team_id' => null]);
      //
      // $this->users()->where('current_team_id', $this->id)
      //         ->update(['current_team_id' => null]);
      //
      // $this->users()->detach();

      $this->delete();
  }
}
