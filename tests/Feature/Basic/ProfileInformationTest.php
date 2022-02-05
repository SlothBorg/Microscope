<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function current_profile_without_an_email_information_is_available()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->username, $component->state['username']);
    }

    /** @test */
    public function current_profile_with_an_email_information_is_available()
    {
        $user = User::factory()->withEmail()->create();
        $this->actingAs($user);

        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->username, $component->state['username']);
        $this->assertEquals($user->email, $component->state['email']);
    }

    /** @test */
    public function profile_without_an_email_information_can_be_updated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(UpdateProfileInformationForm::class)
                ->set('state', ['username' => 'Test Username'])
                ->call('updateProfileInformation');

        $this->assertEquals('Test Username', $user->fresh()->username);
    }

    /** @test */
    public function profile_with_an_email_information_can_be_updated()
    {
        $user = User::factory()->withEmail()->create();
        $this->actingAs($user);

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state', ['username' => 'Test Username', 'email' => 'test@example.com'])
            ->call('updateProfileInformation');

        $this->assertEquals('Test Username', $user->fresh()->username);
        $this->assertEquals('test@example.com', $user->fresh()->email);
    }
}
