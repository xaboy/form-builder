<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\ColorPicker;

trait FormColorPickerTrait
{
    public static function color($field, $title, $value = '')
    {
        return new ColorPicker($field, $title, (string)$value);
    }
}