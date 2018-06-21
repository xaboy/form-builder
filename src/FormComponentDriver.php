<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder;

use FormBuilder\interfaces\FormComponentInterFace;

abstract class FormComponentDriver implements FormComponentInterFace
{
    /**
     * 字段名
     * @var String
     */
    protected $field;

    /**
     * 字段昵称
     * @var String
     */
    protected $title;

    /**
     * 组件名称
     * @var String
     */
    protected $name;

    /**
     * 组件的规则
     * @var array
     */
    protected $props = [];

    /**
     * 字段的值
     * @var
     */
    protected $value = '';

    /**
     * 字段验证规则
     * @var array
     */
    protected $validate = [];

    /**
     * 组件属性设置规则
     * @var array
     */
    protected static $propsRule = [];

    /**
     * 设置组件属性
     * @param $name
     * @param $arguments
     * @return $this
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        if (isset(static::$propsRule[$name])) {
            if (is_array(static::$propsRule[$name])) {
                $this->props[static::$propsRule[$name][1]] = Helper::toType(
                    $arguments[0],
                    static::$propsRule[$name][0]
                );
            } else {
                $this->props[$name] = Helper::toType(
                    $arguments[0],
                    static::$propsRule[$name]
                );
            }
            return $this;
        } else {
            throw new \Exception($name . '方法不存在');
        }
    }

    /**
     * FormComponentDriver constructor.
     * @param String $field 字段名
     * @param String $title 字段昵称
     * @param String $value 字段值
     */
    public function __construct($field, $title, $value = null)
    {
        $this->field = (string)$field;
        $this->title = (string)$title;
        static::value($value);
        static::init();
    }

    /**
     * 组件初始化
     */
    protected function init()
    {

    }


    /**
     * 批量设置组件的规则
     * @param array $props
     */
    public function setProps(array $props = [])
    {
        foreach ($props as $k => $v) {
            $this->{$k}($v);
        }
    }

    /**
     * 获取组件的规则
     * @param $name
     * @return mixed|null
     */
    public function getProps($name)
    {
        return isset($this->props[$name]) ? $this->props[$name] : null;
    }

    /**
     * 设置组件的值
     * @param $value
     * @param string $default
     * @return $this
     */
    public function value($value)
    {
        if ($value === null) $value = '';
        $this->value = (string)$value;
        return $this;
    }

    /**
     * 获取组件的值
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * 获取组件的字段名
     * @return String
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * 设置组件的昵称
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 设置组件的值为必填
     * @param null $message
     * @return $this
     */
    protected function setRequired($message = '', $trigger = 'change', $type = null)
    {
        $validate = [
            'required' => true,
            'message' => $message,
            'trigger' => $trigger
        ];
        if ($type !== null) $validate['type'] = $type;
        $this->validate[] = $validate;
    }

    /**
     * 添加一条验证规则
     * @param array $validate
     * @return $this
     */
    public function validate(array $validate)
    {
        $this->validate[] = $validate;
        return $this;
    }

}