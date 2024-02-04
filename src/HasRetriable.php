<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

/**
 * 包含重试
 * @author Verdient。
 */
trait HasRetriable
{
    /**
     * 是否可以重试
     * @author Verdient。
     */
    protected bool $isRetriable = false;

    /**
     * 获取是否可以重试
     * @return bool
     * @author Verdient。
     */
    public function getIsRetriable(): bool
    {
        return $this->isRetriable;
    }

    /**
     * 创建重试结果
     * @param string $message 提示信息
     * @author Verdient。
     */
    public static function retry(string $message)
    {
        $result = static::failed($message);
        $result->isRetriable = true;
        return $result;
    }
}
