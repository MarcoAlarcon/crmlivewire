<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required', 'max:255', message:'Campo nome é obrigatório')]
    public ?string $name = null;

    #[Validate('required', 'email', 'max:255', message:'Campo email é obrigatório')]
    public ?string $email = null;

    #[Validate('required', 'confirmed', message:'Verificação de email é obrigatória')]
    public ?string $email_confirmation = null;

    #[Validate('required', message:'Campo senha é obrigatório')]
    public ?string $password = null;

    public function submit():void
    {
        $this->validate();

        $user = User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        auth()->login($user);

    }

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.guest');
    }
}
