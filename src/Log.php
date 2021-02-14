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

use Hyperf\Logger\Logger;
use Hyperf\Logger\LoggerFactory;
use Hyperf\Utils\ApplicationContext;

/**
 * @mixin LoggerFactory
 * @mixin Logger
 */
class Log extends Facade
{
    public static function __callStatic($name, $arguments)
    {
        $factory = ApplicationContext::getContainer()->get(static::getIdentifier());

        if (in_array($name, [
            'emergency',
            'alert',
            'critical',
            'error',
            'warning',
            'notice',
            'info',
            'debug',
            'log',
        ])) {
            return $factory->get('default')->{$name}(...$arguments);
        }

        return $factory;
    }

    public static function getIdentifier(): string
    {
        return LoggerFactory::class;
    }
}
