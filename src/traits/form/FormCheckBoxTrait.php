<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;

use FormBuilder\components\Checkbox;

trait FormCheckBoxTrait
{
    public static function checkbox($field, $title, array $value = [])
    {
        return new Checkbox($field, $title, $value);
    }
}