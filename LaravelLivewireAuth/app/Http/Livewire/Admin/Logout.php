<?php

namespace App\Http\Livewire\Admin;

use Auth;
use Livewire\Component;

class Logout extends Component
{
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function render()
    {
        return view('livewire.admin.logout');
    }
}
