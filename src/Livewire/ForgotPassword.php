<?php

namespace Modularavel\Auth\Livewire;

use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use function view;

#[Layout('components.layouts.auth')]
class ForgotPassword extends Component
{
    public string $email = '';

    public function render(): View|string
    {
        return view('auth::livewire.forgot-password');
    }

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}
