<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EducationalResourcesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     public function testUserVewAddPage()
     {
       $this->withoutExceptionHandling();

       $user = factory(User::class)->create();
       //register new user through te registration route
       $response = $this->actingAs($user)->call('Get', '/admin/add/educational-resource')
         ->assertStatus(200);
     }
}
