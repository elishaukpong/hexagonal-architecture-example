<?php

namespace HexagonalArcApp\Domain\Comment;

interface CommentRepositoryInterface
{
    public function create(Comment $comment);
}