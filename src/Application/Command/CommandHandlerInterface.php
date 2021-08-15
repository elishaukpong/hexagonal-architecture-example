<?php

namespace HexagonalArcApp\Application\Command;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $command);
}