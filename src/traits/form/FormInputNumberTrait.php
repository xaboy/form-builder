<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\InputNumber;

trait FormInputNumberTrait
{

    public static function number($field, $title, $value = null)
    {
        return new InputNumber($field, $title, $value);
    }
}