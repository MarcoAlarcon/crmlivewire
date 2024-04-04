<?php

use App\Livewire\Auth\Register;
use App\Models\User;
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

    expect(auth()->check())
        ->and(auth()->user())
        ->id->toBe(User::first()->id);

    
});


test('validation rules', function($f){
    Livewire::test(Register::class)
    ->set($f->field, $f->value)
    ->call('submit')
    ->assertHasErrors([$f->field => $f->rule]);
})->with([
    'name::required' => (object)['field' => 'name' , 'value' => '', 'rule' => 'required'],
    'name::max:255' => (object)['field'=>'name', 'value' => str_repeat('*', 256), 'rule' => 'max'],
    'email::required' => (object)['field'=>'email', 'value' => '', 'rule' => 'required'],
    'email::email' => (object)['field'=>'email', 'value' => 'not-an-email', 'rule' => 'email'],
    'email::max:255' => (object)['field'=>'email', 'value' => str_repeat('*' .'@auditar.com.br', 256), 'rule' => 'email'],
    'email::confirmed' => (object)['field'=>'email', 'value' => 'marco.junior@auditar.com.br', 'rule' => 'confirmed'],
    'email::unique' => (object)['field'=>'email', 'value' => 'marco.junior@auditar.com.br', 'rule' => 'unique'],
    'password::required' => (object)['field'=>'password', 'value' => '', 'rule' => 'required'],
]);