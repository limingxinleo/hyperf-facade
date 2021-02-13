<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HFacade;

use Hyperf\Utils\ApplicationContext;

abstract class Facade
{
    public static function __callStatic($name, $arguments)
    {
        return ApplicationContext::getContainer()->get(static::getIdentifier())->{$name}(...$arguments);
    }

    abstract public static function getIdentifier(): string;
}
