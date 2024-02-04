<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

/**
 * 载荷
 * @author Verdient。
 */
interface PayloadInterface
{
    /**
     * 设置数据
     * @param string|int $name 名称
     * @param mixed $value 值
     * @return static
     * @author Verdient。
     */
    public function set(string|int $name, $value): static;

    /**
     * 获取数据
     * @param string|int $name 名称
     * @param mixed $default 默认值
     * @return mixed
     * @author Verdient。
     */
    public function get(string|int $name, $default = null): mixed;
}
