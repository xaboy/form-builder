<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Option;

trait FormOptionTrait
{
    public static function option($value, $label = '', $disabled = false)
    {
        return new Option($value,$label,$disabled);
    }
}