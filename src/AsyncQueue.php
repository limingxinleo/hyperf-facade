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

use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\AsyncQueue\JobInterface;

/**
 * @mixin DriverFactory
 */
class AsyncQueue extends Facade
{
    public static function getIdentifier(): string
    {
        return DriverFactory::class;
    }

    public function push(JobInterface $job, int $delay = 0)
    {
        return static::get('default')->push($job, $delay);
    }
}
