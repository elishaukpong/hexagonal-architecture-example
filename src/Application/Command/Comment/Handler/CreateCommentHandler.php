<?php

namespace HexagonalArcApp\Application\Command\Comment\Handler;

use Exception;
use HexagonalArcApp\Application\Command\CommandHandlerInterface;
use HexagonalArcApp\Application\Command\CommandInterface;
use HexagonalArcApp\Application\Command\Comment\CreateCommentCommand;
use HexagonalArcApp\Domain\Comment\Comment;
use HexagonalArcApp\Infrastructure\Persistence\CommentRepository;

class CreateCommentHandler implements CommandHandlerInterface
{

    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function handle(CommandInterface $command)
    {
        if (!$command instanceof CreateCommentCommand) {
            throw new Exception("CreateCommentHandler can only handle CreateCommentCommand");
        }

        $comment = new Comment;
        $comment->id = uniqid();
        $comment->title = $command->getTitle();
        $comment->contents = $command->getContents();
        $comment->commenter = $command->getCommenter();

        $this->commentRepository->create($comment);
    }
}