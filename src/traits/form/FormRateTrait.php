<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Rate;

trait FormRateTrait
{
    public static function rate($field, $title, $value = 0)
    {
        return new Rate($field, $title, (float)$value);
    }
}