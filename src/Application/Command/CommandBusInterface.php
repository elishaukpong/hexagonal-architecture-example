<?php

namespace HexagonalArcApp\Application\Command;

interface CommandBusInterface
{
    public function execute(CommandInterface $command);
}