<?php

namespace Sixincode\HiveNewsletter\Actions;

use App\Models\User;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Sixincode\HiveNewsletter\Contracts\CreatesNewsletters as Contract;
use Sixincode\HiveNewsletter\Events\AddingNewsletter;
use Laravel\Jetstream\Jetstream;

class CreatesNewsletters implements Contract
{
  /**
   * Validate and create a newly registered user.
   *
   * @param  array<string, string>  $input
   */
   /**
    * Validate and create a new team for the given user.
    *
    * @param  array<string, string>  $input
    */
   public function create(User $user, array $input): Newsletter
   {
       // Gate::forUser($user)->authorize('create', Newsletter::class);

       Validator::make($input, [
         'name'        => ['required', 'string', 'max:255'],
         'description' => ['required'],
       ])->validateWithBag('createNewsletter');

       AddingNewsletter::dispatch($user);

       $newsletter = $user->ownedNewsletters()->create([
           'name' => $input['name'],
           'description' => $input['description'],
       ]);

       return $newsletter;
   }
 }
