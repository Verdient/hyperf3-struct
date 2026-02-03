<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

use Hyperf\Contract\Jsonable;

/**
 * 空对象
 *
 * @author Verdient。
 */
class EmptyObject implements Jsonable
{
    /**
     * 转换为字符串
     *
     * @author Verdient。
     */
    public function __toString(): string
    {
        return '{}';
    }
}
