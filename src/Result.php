<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

use Throwable;

/**
 * 结果
 *
 * @template TData
 *
 * @author Verdient。
 */
class Result
{
    /**
     * 是否成功
     *
     * @author Verdient。
     */
    protected bool $isOK = false;

    /**
     * 提示信息
     *
     * @author Verdient。
     */
    protected ?string $message = null;

    /**
     * 数据
     *
     * @author Verdient。
     */
    protected mixed $data = null;

    /**
     * 异常对象
     *
     * @author Verdient。
     */
    protected ?Throwable $throwable = null;

    /**
     * 创建成功结果
     *
     * @param TData $data
     *
     * @return static<TData>
     * @author Verdient。
     */
    public static function succeed(mixed $data = null): static
    {
        $result = new static();
        $result->isOK = true;
        $result->data = $data;
        return $result;
    }

    /**
     * 创建失败结果
     *
     * @param string 提示信息
     *
     * @author Verdient。
     */
    public static function failed(Throwable|string $error): static
    {
        $result = new static;

        $result->isOK = false;

        if (is_string($error)) {
            $result->message = $error;
        } else {
            $result->message = $error->getMessage();
            $result->throwable = $error;
        }

        return $result;
    }

    /**
     * 获取是否成功
     *
     * @author Verdient。
     */
    public function getIsOK(): bool
    {
        return $this->isOK;
    }

    /**
     * 获取提示信息
     *
     * @author Verdient。
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * 获取数据
     *
     * @return TData
     * @author Verdient。
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * 获取异常对象
     *
     * @author Verdient。
     */
    public function getThrowable(): ?Throwable
    {
        return $this->throwable;
    }

    /**
     * 判断数据是否存在
     *
     * @author Verdient。
     */
    public function __isset($name)
    {
        if (is_array($this->data)) {
            return array_key_exists($name, $this->data);
        }

        if (is_object($this->data)) {
            if (property_exists($this->data, $name)) {
                return true;
            }

            if (method_exists($this->data, '__isset')) {
                return $this->data->__isset($name);
            }

            return false;
        }

        return false;
    }

    /**
     * 支持以属性方式访问数据
     *
     * @author Verdient。
     */
    public function __get($name)
    {
        if (is_array($this->data)) {
            return $this->data[$name] ?? null;
        }

        if (is_object($this->data)) {
            if (property_exists($this->data, $name)) {
                return $this->data->{$name};
            }
            return null;
        }

        return null;
    }
}
