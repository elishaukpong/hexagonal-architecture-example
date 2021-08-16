<?php

namespace HexagonalArcApp\Infrastructure\CommandBus;

class CommandBusFactory
{
    const SYNCHRONOUS_BUS = 1;

    /**
     * @throws \Exception
     */
    public static function make($type)
    {
        switch ($type)
        {
            case self::SYNCHRONOUS_BUS:
                return new SynchronousCommandBus();
            default:
                throw new \Exception('Pass a valid bus type');
        }
    }
}