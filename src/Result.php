<?php

declare(strict_types=1);

namespace Verdient\Hyperf3\Struct;

/**
 * 结果
 * @author Verdient。
 */
class Result
{
    /**
     * 是否成功
     * @author Verdient。
     */
    protected bool $isOK = false;

    /**
     * 提示信息
     * @author Verdient。
     */
    protected ?string $message = null;

    /**
     * 数据
     * @author Verdient。
     */
    protected mixed $data = null;

    /**
     * 创建成功结果
     * @return static
     * @author Verdient。
     */
    public static function succeed($data = null)
    {
        $result = new static();
        $result->isOK = true;
        $result->data = $data;
        return $result;
    }

    /**
     * 创建失败结果
     * @param string 提示信息
     * @return static
     * @author Verdient。
     */
    public static function failed(string $message): static
    {
        $result = new static;
        $result->isOK  = false;
        $result->message = $message;
        return $result;
    }

    /**
     * 获取是否成功
     * @return bool
     * @author Verdient。
     */
    public function getIsOK(): bool
    {
        return $this->isOK;
    }

    /**
     * 获取提示信息
     * @return string|null
     * @author Verdient。
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * 获取数据
     * @return mixed
     * @author Verdient。
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
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
