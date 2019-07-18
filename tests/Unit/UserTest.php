<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\SeedDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use \Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     /** @test */
    /*use RefreshDatabase;
    public function testUserRegister()
    {
      $this->withoutExceptionHandling();
      $request = [
        'name' => 'wejdan',
        'email' => 'wejdan@pnu.edu.sa',
        'password' => 'Lhrc@1234',
        'password_confirmation' => 'Lhrc@1234',
        '_token' => csrf_token(), // secret
      ];
      //register new user through te registration route
      $response = $this->call('POST', '/register', $request)
      ->assertStatus(302);
      //assert that the new registered user is in the database
      $this->assertDatabaseHas('users', ['name' => 'wejdan']);
    }

    //comment the above test to run next test as they are not related
    public function testUserLogin()
    {
      $this->withoutExceptionHandling();

      //get a ser from Database
      //register new user through te registration route
      $response = $this->call('POST', '/login', ['email'=>'wejdan@pnu.edu.sa', 'password'=>'Lhrc@1234'])
      ->assertStatus(302);

    }*/
}
