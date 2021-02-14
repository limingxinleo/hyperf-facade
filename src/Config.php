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

use Hyperf\Config\Config as ConfigIdentifier;
use Hyperf\Contract\ConfigInterface;

/**
 * @mixin ConfigIdentifier
 */
class Config extends Facade
{
    public static function getIdentifier(): string
    {
        return ConfigInterface::class;
    }
}
