<?php

use App\Livewire\Auth\Register;
use Livewire\Features\SupportValidation\TestsValidation;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('renders successfully', function () {
    Livewire::test(Register::class)
        ->assertStatus(200);
});

it('should be able to register a new user in the system', function(){
    Livewire::test(Register::class)
        ->set('name', 'Marco Antonnio Hernandez Alarcon Junior')
        ->set('email', 'marco.junior@auditar.com.br')
        ->set('email_confirmation', 'marco.junior@auditar.com.br')
        ->set('password', 'password')
        ->call('submit')
        ->assertHasNoErrors();

    assertDatabaseHas('users', [
        'name' => 'Marco Antonnio Hernandez Alarcon Junior',
        'email' => 'marco.junior@auditar.com.br'
    ]);

    assertDatabaseCount('users', count:1);

    
});