<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
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
       $resource = [
         '_token' => csrf_token(),
         'title' => 'title1',
         'topics' => '1',
         'gender' => '1',
         'age-group' => '1',
         'langauge' => '1',
         'date_of_aproval' => '12/08/2019',
         'keywords' => 'h,y,u',
         'url' => 'http://10.24.142.232:8000/admin/create/educational-resource',
         'upload' => '',
         'format' => '1',
       ];
       $user = factory(User::class)->create();
       //register new user through te registration route
       $response = $this->actingAs($user)->call('Post', '/admin/store/educational-resource', $resource)
      ->assertSessionHas($seccuss, "Resource were added successfuly");

      $this->assertDatabaseHas('educational_resources', ['title'=>$resource->title]);
     }
}
