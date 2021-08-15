<?php

namespace HexagonalArcApp\Domain\Post;

interface PostRepositoryInterface
{
    public function create(Post $post);
}