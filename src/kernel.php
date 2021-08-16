<?php

use HexagonalArcApp\Application\Command\Comment\CreateCommentCommand;
use HexagonalArcApp\Application\Command\Comment\Handler\CreateCommentHandler;
use HexagonalArcApp\Application\Command\Post\CreatePostCommand;
use HexagonalArcApp\Application\Command\Post\Handler\CreatePostHandler;
use HexagonalArcApp\Infrastructure\CommandBus\SynchronousCommandBus;
use HexagonalArcApp\Infrastructure\Persistence\CommentRepository;
use HexagonalArcApp\Infrastructure\Persistence\PostRepository;

require '../vendor/autoload.php';


$commandBus = new SynchronousCommandBus();

$postRepository = new PostRepository;
$postCommandHandler = new CreatePostHandler($postRepository);

$commentRepository = new CommentRepository;
$commentCommandHandler = new CreateCommentHandler($commentRepository);

$commandBus->register(CreatePostCommand::class, $postCommandHandler)
    ->register(CreateCommentCommand::class, $commentCommandHandler);


return $commandBus;