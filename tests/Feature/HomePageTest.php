<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * Home Page tests.
     *
     * @return void
     */
    public function test_can_load_the_home_page()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeText('Play Microscope online!');
    }
}
