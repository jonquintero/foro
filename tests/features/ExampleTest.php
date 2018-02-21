<?php


class ExampleTest extends FeatureTestCase
{
    /** @test */
    function test_basic_example()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Jonathan Quintero',
            'email' => 'jonquintero@hotmail.com'
        ]);
        $this->actingAs($user,'api')
            ->visit('api/user')
             ->see('Jonathan Quintero')
             ->see('jonquintero@hotmail.com');
    }
}
