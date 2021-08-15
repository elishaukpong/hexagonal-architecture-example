<?php

namespace HexagonalArcApp\Application\Command\Post\Handler;

use Exception;
use HexagonalArcApp\Application\Command\CommandHandlerInterface;
use HexagonalArcApp\Application\Command\CommandInterface;
use HexagonalArcApp\Application\Command\Post\CreatePostCommand;
use HexagonalArcApp\Domain\Post\Post;
use HexagonalArcApp\Domain\Post\PostRepositoryInterface;

class CreatePostHandler implements CommandHandlerInterface
{

    private $postRepository;

    // We'll use constructor injection to inject this handlers
    // dependencies. We'll typehint the interface since we do not
    // care where to store it at this point.
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    // Since we are not permitted more specific types of the
    // CommandInterface, we'll have to check its type.
    /**
     * @throws Exception
     */
    public function handle(CommandInterface $command)
    {
        if (!$command instanceof CreatePostCommand) {
            throw new Exception("CreatePostHandler can only handle CreatePostCommand");
        }

        $post = new Post;
        $post->id = uniqid();
        $post->title = $command->getTitle();
        $post->contents = $command->getContents();

        $this->postRepository->create($post);
    }
}