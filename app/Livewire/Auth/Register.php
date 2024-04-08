<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required', message:'Campo nome é obrigatório')]
    #[Validate('max:255', message:'Campo nome deve ter no máximo 255 caracteres')]
    public ?string $name = null;

    #[Validate('required', message:'Campo e-mail é obrigatório')]
    #[Validate('email',  message:'Campo e-mail deve ser no formato de e-mail: exemplo@exemplo.com')]
    #[Validate('max:255', message:'Campo e-mail deve ter no máximo 255 caracteres')]
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
