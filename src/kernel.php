<?php

use HexagonalArcApp\Infrastructure\CommandBus\CommandBusFactory;

require '../vendor/autoload.php';

$config = require_once 'config.php';

$commandBus = CommandBusFactory::make(CommandBusFactory::SYNCHRONOUS_BUS);

try{
    $commandBus->registerCommands($config['commands']);
}catch (\Exception $exception){
    echo $exception->getMessage();
    exit;
}

return $commandBus;