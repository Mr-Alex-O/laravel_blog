<?php

namespace Tests\Unit;

use App\Post;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExampleTest extends TestCase
{


    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {


        //Given I have two records in the database that are posts,
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);
        //And each on is posted a month apart.


        //When I fetch the archives.
        $posts = Post::archives();

        //Then the response should be in the proper format.
        $this->assertEquals([

            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1

            ],

            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1

            ]

        ], $posts);



    }
}
