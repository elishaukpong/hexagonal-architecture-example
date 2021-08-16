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

        $this->handlers[$commandName]->handle($command);
        return $this;
    }

    // Now all we need is a function to register handlers
    public function register($commandName, CommandHandlerInterface $command)
    {
        $this->handlers[$commandName] = $command;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function registerCommands(array $commands)
    {
        foreach ($commands as $command => $commandHandler){
            //check that command has two array values
            if(count($commandHandler) != 2){
                throw new Exception($command . " does not have handler and repository provided.");
            }

            //this is a very crude way to do this,
            // reflection class would be the best way to go.
            $handler = new $commandHandler[0](new $commandHandler[1]);

            $this->register($command,$handler);
        }
    }
}