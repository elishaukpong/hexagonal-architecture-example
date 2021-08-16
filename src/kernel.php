<?php

use HexagonalArcApp\Application\Command\Comment\CreateCommentCommand;
use HexagonalArcApp\Application\Command\Comment\Handler\CreateCommentHandler;
use HexagonalArcApp\Application\Command\Post\CreatePostCommand;
use HexagonalArcApp\Application\Command\Post\Handler\CreatePostHandler;
use HexagonalArcApp\Infrastructure\CommandBus\CommandBusFactory;
use HexagonalArcApp\Infrastructure\CommandBus\SynchronousCommandBus;
use HexagonalArcApp\Infrastructure\Persistence\CommentRepository;
use HexagonalArcApp\Infrastructure\Persistence\PostRepository;

require '../vendor/autoload.php';

$config = require_once 'config.php';

$commandBus = CommandBusFactory::make(CommandBusFactory::SYNCHRONOUS_BUS);

$commandBus->registerCommands($config['commands']);

return $commandBus;