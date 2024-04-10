<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Login;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $this->get('/login')
            ->assertSeeLivewire(Login::class);
    }
}
