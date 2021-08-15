<?php

use HexagonalArcApp\Application\Command\Post\CreatePostCommand;
use HexagonalArcApp\Application\Command\Post\Handler\CreatePostHandler;
use HexagonalArcApp\Infrastructure\CommandBus\SynchronousCommandBus;
use HexagonalArcApp\Infrastructure\Persistence\PostRepository;

require '../vendor/autoload.php';

$commandBus = new SynchronousCommandBus();

$postRepository = new PostRepository;
$commandHandler = new CreatePostHandler($postRepository);

$commandBus->register(CreatePostCommand::class, $commandHandler);

$command = new CreatePostCommand(
    "This is the post title",
    "And this is the content"
);

$commandBus->execute($command);
