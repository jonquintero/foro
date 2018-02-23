<?php
namespace Tests\Feature;

use FeatureTestCase;
use TestCase;
use App\Post;


class ShowPostTest extends FeatureTestCase
{
   /** @test  */
    public function test_a_user_can_see_the_post_details()
    {

        $user = $this->defaultUser([
            'name' => 'Jonathan Quintero'
        ]);

        $post = factory(Post::class)->make([
            'title' => 'Este es el titulo del post',
            'content' => 'Este es el contenido del post',
        ]);

        //asignar el post al usuario
        $user->posts()->save($post);

        //When

        $this->visit(route('posts.show',$post))
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);
    }
}
