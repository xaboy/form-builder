<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Hidden;

trait FormHiddenTrait
{
    public static function hidden($field, $value)
    {
        return new Hidden($field, $value);
    }
}