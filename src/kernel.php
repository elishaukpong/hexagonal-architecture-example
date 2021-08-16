<?php

use HexagonalArcApp\Infrastructure\CommandBus\CommandBusFactory;

require '../vendor/autoload.php';

$config = require_once 'config.php';

$commandBus = CommandBusFactory::make(CommandBusFactory::SYNCHRONOUS_BUS);

$commandBus->registerCommands($config['commands']);

return $commandBus;