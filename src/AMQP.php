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

use Hyperf\Amqp\Producer;

/**
 * @mixin Producer
 */
class AMQP extends Facade
{
    public static function getIdentifier(): string
    {
        return Producer::class;
    }
}
