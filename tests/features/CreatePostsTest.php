<?php

namespace Tests\Feature;

use TestCase;

class CreatePostsTest extends TestCase
{
    /** @test */

    public function test_a_user_create_a_post()
    {
        // Having
        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';

        $this->actingAs($this->defaultUser());

        //When
        $this->visit(route('posts.create'))
            ->type($title, 'title')
            ->type($content, 'content')
            ->press('Publicar') ;

        // Then
        $this->seeInDatabase('posts',[
           'title' => $title,
           'content' => $content,
           'pending' => true,
        ]);
        // Test a user is redirected to the posts details after creating it.
        $this->seeInElement('h1', $title);
    }
}