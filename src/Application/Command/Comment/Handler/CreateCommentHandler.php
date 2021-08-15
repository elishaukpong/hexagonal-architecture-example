<?php

namespace HexagonalArcApp\Application\Command\Comment\Handler;

use HexagonalArcApp\Application\Command\CommandHandlerInterface;
use HexagonalArcApp\Application\Command\CommandInterface;

class CreateCommentHandler implements CommandHandlerInterface
{

    private $repository;

    public function __construct(CommentRepository $repository)
    {

    }

    public function handle(CommandInterface $command)
    {

    }
}