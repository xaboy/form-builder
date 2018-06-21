<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\components;


use FormBuilder\FormComponentDriver;

class Hidden extends FormComponentDriver
{

    protected $name = 'hidden';

    public function __construct($field, $value)
    {
        $this->field = (string)$field;
        static::value($value);
    }

    public function build()
    {
        return [
            'type' => $this->name,
            'field' => $this->field,
            'value' => $this->value
        ];
    }
}