<?php

namespace Sixincode\HiveNewsletter\Traits;

use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasNewsletter
{
  public function subscribeToNewletter(Newsletter $newsletter, $active = false)
  {
      $subscription = NewsletterSubscription::create([
        'email'         => $this->email,
        'newsletter_id' => $newsletter->id,
        'is_active'     => $active,
        'email_verified_at'  => ($active && !check_newsletterSubscriptionEmailVerification()) ? now() : null,
      ]);

      if (check_newsletterSubscriptionEmailVerification()) {
          $subscription->sendEmailVerificationNotification();
      }
  }

  /**
   * Get the email address that should be used for verification.
   *
   * @return string
   */
  public function getEmailForVerification()
  {
      return $this->email;
  }

  public function unsubscribeToNewsletter(Newsletter $newsletter, $email)
  {
      NewsletterSubscription::whereEmail($email)
                            ->where('newsletter_id', $newsletter->id)
                            ->first()
                            ->delete();
  }

  // public function isCurrentNewsletter($newsletter)
  // {
  //     return $newsletter->id === $this->currentNewsletter->id;
  // }
  //
  // /**
  //  * Get the current newsletter of the user's context.
  //  *
  //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  //  */
  // public function currentNewsletter()
  // {
  //     if (is_null($this->current_newsletter_id) && $this->id) {
  //         $this->switchNewsletter($this->personalNewsletter());
  //     }
  //
  //     return $this->belongsTo(Newsletter::class, 'current_newsletter_id');
  // }

  // /**
  //  * Switch the user's context to the given newsletter.
  //  *
  //  * @param  mixed  $newsletter
  //  * @return bool
  //  */
  // public function switchNewsletter($newsletter)
  // {
  //     if (! $this->belongsToNewsletter($newsletter)) {
  //         return false;
  //     }
  //
  //     $this->forceFill([
  //         'current_newsletter_id' => $newsletter->id,
  //     ])->save();
  //
  //     $this->setRelation('currentNewsletter', $newsletter);
  //
  //     return true;
  // }

  /**
   * Get all of the newsletters the user owns or belongs to.
   *
   * @return \Illuminate\Support\Collection
   */
  public function allNewsletters()
  {
      return $this->ownedNewsletters->merge($this->newsletters)->sortBy('name');
  }

  /**
   * Get all of the newsletters the user owns.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function ownedNewsletters() :MorphMany
  {
      return $this->morphMany(Newsletter::class, 'owner'); 
  }

  /**
   * Get all of the newsletters the user belongs to.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function newsletters()
  {
      return $this->belongsToMany(Newsletter::class, NewsletterSubscription::class, 'email', 'newsletter_id')
                      ->withPivot('email_verified_at', 'is_active')
                      ->withTimestamps()
                      ->as('subscription');
  }

  // /**
  //  * Get the user's "personal" newsletter.
  //  *
  //  * @return \App\Models\Newsletter
  //  */
  // public function personalNewsletter()
  // {
  //     return $this->ownedNewsletters->where('personal_newsletter', true)->first();
  // }

  /**
   * Determine if the user owns the given newsletter.
   *
   * @param  mixed  $newsletter
   * @return bool
   */
  public function ownsNewsletter($newsletter)
  {
      if (is_null($newsletter)) {
          return false;
      }

      return ((get_class($this) == $newsletter->owner_type ) && ($this->id == $newsletter->owner_id));
  }

  /**
   * Determine if the user belongs to the given newsletter.
   *
   * @param  mixed  $newsletter
   * @return bool
   */
  public function belongsToNewsletter($newsletter)
  {
      if (is_null($newsletter)) {
          return false;
      }

      return $this->ownsNewsletter($newsletter) || $this->newsletters->contains(function ($t) use ($newsletter) {
          return $t->id === $newsletter->id;
      });
  }

  // /**
  //  * Get the role that the user has on the newsletter.
  //  *
  //  * @param  mixed  $newsletter
  //  * @return \Laravel\Jetstream\Role|null
  //  */
  // public function newsletterRole($newsletter)
  // {
  //     if ($this->ownsNewsletter($newsletter)) {
  //         return new OwnerRole;
  //     }
  //
  //     if (! $this->belongsToNewsletter($newsletter)) {
  //         return;
  //     }
  //
  //     $role = $newsletter->users
  //         ->where('email', $this->email)
  //         ->first()
  //         ->subscription
  //         ->role;
  //
  //     return $role ? Jetstream::findRole($role) : null;
  // }

  // /**
  //  * Determine if the user has the given role on the given newsletter.
  //  *
  //  * @param  mixed  $newsletter
  //  * @param  string  $role
  //  * @return bool
  //  */
  // public function hasNewsletterRole($newsletter, string $role)
  // {
  //     if ($this->ownsNewsletter($newsletter)) {
  //         return true;
  //     }
  //
  //     return $this->belongsToNewsletter($newsletter) && optional(Jetstream::findRole($newsletter->users->where(
  //         'id', $this->id
  //     )->first()->subscription->role))->key === $role;
  // }
  //
  // /**
  //  * Get the user's permissions for the given newsletter.
  //  *
  //  * @param  mixed  $newsletter
  //  * @return array
  //  */
  // public function newsletterPermissions($newsletter)
  // {
  //     if ($this->ownsNewsletter($newsletter)) {
  //         return ['*'];
  //     }
  //
  //     if (! $this->belongsToNewsletter($newsletter)) {
  //         return [];
  //     }
  //
  //     return (array) optional($this->newsletterRole($newsletter))->permissions;
  // }

  // /**
  //  * Determine if the user has the given permission on the given newsletter.
  //  *
  //  * @param  mixed  $newsletter
  //  * @param  string  $permission
  //  * @return bool
  //  */
  // public function hasNewsletterPermission($newsletter, string $permission)
  // {
  //     if ($this->ownsNewsletter($newsletter)) {
  //         return true;
  //     }
  //
  //     if (! $this->belongsToNewsletter($newsletter)) {
  //         return false;
  //     }
  //
  //     if (in_array(HasApiTokens::class, class_uses_recursive($this)) &&
  //         ! $this->tokenCan($permission) &&
  //         $this->currentAccessToken() !== null) {
  //         return false;
  //     }
  //
  //     $permissions = $this->newsletterPermissions($newsletter);
  //
  //     return in_array($permission, $permissions) ||
  //            in_array('*', $permissions) ||
  //            (Str::endsWith($permission, ':create') && in_array('*:create', $permissions)) ||
  //            (Str::endsWith($permission, ':update') && in_array('*:update', $permissions));
  // }

}
