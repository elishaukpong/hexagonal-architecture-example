<?php

use HexagonalArcApp\Application\Command\Comment\CreateCommentCommand;
use HexagonalArcApp\Application\Command\Post\CreatePostCommand;

$commandBus = require_once 'kernel.php';

//This should take place in the controller,
// and the data carried from the web request,
// cli, or anywhere else.

$createPostCommand = new CreatePostCommand(
    "This is the post title",
    "And this is the content"
);

$createCommentCommand = new CreateCommentCommand(
    "This is the post title",
    "And this is the content",
    "We are free indeed"
);

$commandBus->execute($createPostCommand)
            ->execute($createCommentCommand);
