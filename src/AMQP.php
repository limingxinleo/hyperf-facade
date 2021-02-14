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

use Hyperf\Amqp\Message\ProducerMessageInterface;
use Hyperf\Amqp\Producer;

/**
 * @method static produce(ProducerMessageInterface $producerMessage, bool $confirm = false, int $timeout = 5)
 */
class AMQP extends Facade
{
    public static function getIdentifier(): string
    {
        return Producer::class;
    }
}
