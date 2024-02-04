<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

/**
 * 载荷
 * @author Verdient。
 */
class Payload implements PayloadInterface
{
    /**
     * 数据
     * @author Verdient。
     */
    protected array $data = [];

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function set(string|int $name, $value): static
    {
        $this->data[$name] = $value;
        return $this;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function get(string|int $name, $default = null): mixed
    {
        return $this->data[$name] ?? null;
    }
}
