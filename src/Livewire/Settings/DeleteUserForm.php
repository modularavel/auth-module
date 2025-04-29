<?php

namespace Modularavel\Auth\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Modularavel\Auth\Livewire\Actions\Logout;
use function view;

class DeleteUserForm extends Component
{
    public string $password = '';

    public function render(): View|string
    {
        return view('auth::livewire.settings.delete-user-form');
    }

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}
