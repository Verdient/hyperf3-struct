<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

/**
 * 计数器
 * @author Verdient。
 */
class Counter
{
    /**
     * 累加
     * @author Verdient。
     */
    protected int $aggregate = 0;

    /**
     * 数量
     * @author Verdient。
     */
    protected int $count = 0;

    /**
     * 收集
     * @param int $number 数值
     * @author Verdient。
     */
    public function collect(int $number)
    {
        $this->aggregate += $number;
        $this->count++;
    }

    /**
     * 获取累加值
     * @return int
     * @author Verdient。
     */
    public function getAggregate(): int
    {
        return $this->aggregate;
    }

    /**
     * 获取数量
     * @return int
     * @author Verdient。
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * 转换为数组
     * @author Verdient。
     */
    public function toArray()
    {
        return [
            'count' => $this->count,
            'amount' => $this->aggregate
        ];
    }
}
