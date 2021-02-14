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
namespace HyperfTest\Cases;

use HFacade\DI;
use HFacade\Listener\BootListener;
use HFacade\Redis;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Redis\Redis as RedisIdentifier;
use Hyperf\Utils\ApplicationContext;
use Mockery;
use Psr\Container\ContainerInterface;

/**
 * @internal
 * @coversNothing
 */
class FacadeTest extends AbstractTestCase
{
    public function testFacade()
    {
        $container = Mockery::mock(ContainerInterface::class);
        ApplicationContext::setContainer($container);
        $container->shouldReceive('get')->with(RedisIdentifier::class)->andReturn($mockery = Mockery::mock(RedisIdentifier::class));
        $mockery->shouldReceive('get')->with('test')->once()->andReturn($id = uniqid());
        $this->assertSame($id, Redis::get('test'));
    }

    public function testBootListener()
    {
        $container = Mockery::mock(ContainerInterface::class);
        ApplicationContext::setContainer($container);
        $container->shouldReceive('has')->withAnyArgs()->andReturnTrue();
        $container->shouldReceive('get')->with(StdoutLoggerInterface::class)->once()->andReturn($logger = Mockery::mock(StdoutLoggerInterface::class));
        $logger->shouldReceive('warning')->with('Cannot declare class Redis, because the name is already in use.')->once()->andReturnNull();
        (new BootListener($container))->process(new \stdClass());

        $container->shouldReceive('get')->with(ContainerInterface::class)->andReturn($container);
        $container->shouldReceive('get')->with('test')->twice()->andReturn($id = uniqid());

        $this->assertSame($id, DI::get('test'));
        $this->assertSame($id, \DI::get('test'));
    }
}
