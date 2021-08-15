<?php

namespace HexagonalArcApp\Application\Command\Comment;

use HexagonalArcApp\Application\Command\CommandInterface;

class CreateCommentCommand implements CommandInterface
{
    private $title;
    private $contents;
    private $commenter;

    public function __construct($title, $contents, $commenter)
    {
        $this->title = $title;
        $this->contents = $contents;
        $this->commenter = $commenter;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function getCommenter()
    {
        return $this->commenter;
    }

}

