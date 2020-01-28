<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testExample()
  {
    $response = $this->get('/');
    $response->assertStatus(200);
  }

  public function testPasswordRequired()
  {
    $response = $this->post('/register', [
      'name' => 'Userユーザ遊佐%％123',
      'phone_number' => '080',
      'email' => 'Test_1@Email.com',
      'password' => '',
      'password_confirmation' => 'password'
    ]);
    $response->assertSessionHasErrors([
      'password' => 'パスワードは必須です。'
    ]);
  }
  public function testValidRegister()
  {
    $response = $this->post('/register', [
      'name' => 'Userユーザ遊佐%％123',
      'phone_number' => '080',
      'email' => 'Test_2@Email.com',
      'password' => 'password',
      'password_confirmation' => 'password'
    ]);
    $response->assertSessionHasNoErrors();
  }
}
