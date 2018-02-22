<?php
namespace Tests\Feature;

use App\User;
use TestCase;


class ExampleTest extends TestCase
{
    /** @test */
    function test_basic_example()
    {
        $user = factory(User::class)->create([
            'name' => 'Jonathan Quintero',
            'email' => 'jonquintero@hotmail.com'
        ]);
        $this->actingAs($user,'api')
            ->visit('api/user')
             ->see('Jonathan Quintero')
             ->see('jonquintero@hotmail.com');
    }
}
