<?php

namespace HexagonalArcApp\Infrastructure\Persistence;

use HexagonalArcApp\Domain\Comment\CommentRepositoryInterface;
use HexagonalArcApp\Domain\Comment\Comment;

class CommentRepository implements CommentRepositoryInterface
{

    public $comments = [];

    public function create(Comment $comment)
    {
        $this->comments[] = $comment;

        // Obviously, this is for testing purposes only
        echo "Comment with id {$comment->id} was created.";
    }
}