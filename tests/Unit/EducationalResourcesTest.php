<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\EducationalResource;
use Faker\Generator as Faker;
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
       $response = $this->actingAs($user)->call('Get', '/admin/create/educational-resource')
         ->assertStatus(200);
     }
     public function testUserAddResource()
     {
       $this->withoutExceptionHandling();
       //create user to login
       $user = factory(User::class)->create();
       //create resource dummy data
       $resource = factory(EducationalResource::class)->create();
       $resource->user_id = $user->id;
       //sen post request as created user
       $response = $this->actingAs($user)->call('Post', '/admin/store/educational-resource', $resource)
       //assert that the session has success message
      ->assertSessionHas('success', "Resource were added successfuly");
      //assert that databse has data of created resource
      $this->assertDatabaseHas('educational_resources', ['title'=>$resource->title]);
     }
}
