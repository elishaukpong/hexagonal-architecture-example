<?php

namespace HexagonalArcApp\Infrastructure\Persistence;

use HexagonalArcApp\Domain\Post\Post;
use HexagonalArcApp\Domain\Post\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{

    public $posts = [];

    public function create(Post $post)
    {
        $this->posts[] = $post;

        // Obviously, this is for testing purposes only
        echo "Post with id {$post->id} was created.";
    }
}