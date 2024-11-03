<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required|min:6')]
    public $password = '';
    public string $loginMessage = '';

    public function render()
    {
        return view('livewire.login');
    }

    public function authenticate()
    {
        $this->validate();

        $valid = auth()->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if ($valid) {
            $this->redirectIntended('/dashboard');
        } else{
            $this->loginMessage = 'Invalid credentials';
        }
    }
}
