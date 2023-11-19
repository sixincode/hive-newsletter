<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Newsletters;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
// use Sixincode\HiveNewsletter\Contracts\CreatesNewsletters;
use Sixincode\HiveNewsletter\Actions\CreatesNewsletters;
use Sixincode\HiveNewsletter\Models\Newsletter;

class CreateUserNewsletter extends Component
{
  public Newsletter $newsletter;

  public $state = [];

  public function mount(

  )
  {
    //
  }

  public function createNewsletter(CreatesNewsletters $creator)
  {
    $this->resetErrorBag();

    $creator->create(auth()->user(), $this->state);

    return $this->redirect(route('newsletters.user.index'));
  }

  public function getUserProperty()
  {
    return Auth::user();
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.newsletters.createUserNewsletter');
  }
}
