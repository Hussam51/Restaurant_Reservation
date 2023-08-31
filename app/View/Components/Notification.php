<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class Notification extends Component
{
    public $Newnotifications;
    public $Newcount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = User::first();
        $this->Newnotifications = $user->unreadNotifications()->take(10)->get();
        $this->Newcount = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification');
    }
}
