<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

/**
 * 包含重新计划
 * @author Verdient。
 */
trait HasReschedule
{
    /**
     * 下次计划执行的时间
     * @author Verdient。
     */
    protected ?int $schedule = null;

    /**
     * 创建重新计划结果
     * @param int $schedule 计划执行的时间
     * @return static
     * @author Verdient。
     */
    public static function reschedule(int $schedule): static
    {
        $result = new static();
        $result->isOK = false;
        $result->schedule = $schedule;
        $result->message = '计划于 ' . date('Y-m-d H:i:s', $schedule) . ' 再次执行';
        return $result;
    }

    /**
     * 获取下次执行的时间
     * @return int
     * @author Verdient。
     */
    public function getSchedule(): ?int
    {
        return $this->schedule;
    }
}
