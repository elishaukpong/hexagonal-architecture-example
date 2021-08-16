<?php


use HexagonalArcApp\Application\Command\Comment\Handler\CreateCommentHandler;
use HexagonalArcApp\Application\Command\Post\Handler\CreatePostHandler;
use HexagonalArcApp\Infrastructure\Persistence\CommentRepository;
use HexagonalArcApp\Infrastructure\Persistence\PostRepository;

//Register Handler and repository code here

return [
    CreatePostHandler::class => PostRepository::class,
    CreateCommentHandler::class => CommentRepository::class
];
