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
namespace HFacade\Listener;

use HFacade\AMQP;
use HFacade\App;
use HFacade\AsyncQueue;
use HFacade\Cache;
use HFacade\Config;
use HFacade\DI;
use HFacade\Event;
use HFacade\Filesystem;
use HFacade\Log;
use HFacade\NSQ;
use HFacade\Redis;
use HFacade\Session;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\BootApplication;
use Psr\Container\ContainerInterface;

class BootListener implements ListenerInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listen(): array
    {
        return [
            BootApplication::class,
        ];
    }

    public function process(object $event)
    {
        foreach ($this->getMapping() as $alias => $class) {
            if (class_exists($alias)) {
                if ($this->container->has(StdoutLoggerInterface::class) && $logger = $this->container->get(StdoutLoggerInterface::class)) {
                    $logger->warning("Cannot declare class {$alias}, because the name is already in use.");
                }
                continue;
            }

            class_alias($class, $alias);
        }
    }

    protected function getMapping(): array
    {
        return [
            'AMQP' => AMQP::class,
            'App' => App::class,
            'AsyncQueue' => AsyncQueue::class,
            'Cache' => Cache::class,
            'Config' => Config::class,
            'DI' => DI::class,
            'Event' => Event::class,
            'Filesystem' => Filesystem::class,
            'Log' => Log::class,
            'NSQ' => NSQ::class,
            'Redis' => Redis::class,
            'Session' => Session::class,
        ];
    }
}
