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

use League\Flysystem\Filesystem as Identifier;

/**
 * @mixin Identifier
 */
class Filesystem extends Facade
{
    public static function getIdentifier(): string
    {
        return Identifier::class;
    }
}
