<?php

use HexagonalArcApp\Application\Command\Comment\CreateCommentCommand;
use HexagonalArcApp\Application\Command\Comment\Handler\CreateCommentHandler;
use HexagonalArcApp\Application\Command\Post\CreatePostCommand;
use HexagonalArcApp\Application\Command\Post\Handler\CreatePostHandler;
use HexagonalArcApp\Infrastructure\Persistence\CommentRepository;
use HexagonalArcApp\Infrastructure\Persistence\PostRepository;

//Register Commands, Handlers and Repository code here

return [
    'commands' => [
        CreatePostCommand::class => [CreatePostHandler::class, PostRepository::class],
        CreateCommentCommand::class => [CreateCommentHandler::class, CommentRepository::class]
    ]
];
