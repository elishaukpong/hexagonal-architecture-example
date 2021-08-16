<?php

namespace HexagonalArcApp\Application\Command;

interface CommandBusInterface
{
    public function execute(CommandInterface $command);

    public function register(string $commandName, CommandHandlerInterface $command);

    public function registerCommands(array $commands);
}