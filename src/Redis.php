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

use Hyperf\Redis\Redis as Indentifier;

class Redis extends Facade
{
    public static function getIdentifier(): string
    {
        return Indentifier::class;
    }
}
