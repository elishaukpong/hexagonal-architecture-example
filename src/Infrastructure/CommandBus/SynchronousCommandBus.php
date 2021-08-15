<?php

namespace HexagonalArcApp\Infrastructure\CommandBus;

use Exception;
use HexagonalArcApp\Application\Command\CommandBusInterface;
use HexagonalArcApp\Application\Command\CommandHandlerInterface;
use HexagonalArcApp\Application\Command\CommandInterface;

class SynchronousCommandBus implements CommandBusInterface
{

    /** @var CommandHandlerInterface[] */
    private $handlers = [];

    /**
     * @throws Exception
     */
    public function execute(CommandInterface $command)
    {
        $commandName = get_class($command);

        // We'll need to check if the Command that's given
        // is actually registered to be handled here.
        if(! array_key_exists($commandName, $this->handlers)) {
            throw new Exception("{$commandName} is not supported by the SynchronousCommandBus.");
        }

        return $this->handlers[$commandName]->handle($command);
    }

    // Now all we need is a function to register handlers
    public function register($commandName, CommandHandlerInterface $command)
    {
        $this->handlers[$commandName] = $command;

        return $this;
    }
}