<?php

namespace Sixincode\HiveNewsletter\Action;

use Sixincode\HiveNewsletter\Models\Newsletter;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Sixincode\HiveNewsletter\Contracts\CreatesNewsletters;
use Sixincode\HiveNewsletter\Events\CreateNewsletter as CreateNewsletterEvent;
use Laravel\Jetstream\Jetstream;

class CreateNewsletter implements CreatesNewsletters
{
    /**
     * Validate and create a new team for the given user.
     *
     * @param  array<string, string>  $input
     */
    public function create(User $user, array $input): Newsletter
    {
        Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());

        Validator::make($input, [
          'name'        => ['required', 'string', 'max:255'],
          'description' => ['required'],
        ])->validateWithBag('createNewsletter');

        CreateNewsletterEvent::dispatch($user);

        $newsletter = $user->ownedNewsletters()->create([
            'name' => $input['name'],
            'description' => $input['description'],
        ]);

        return $newsletter;
    }
}
