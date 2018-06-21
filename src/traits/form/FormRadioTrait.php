<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Radio;

trait FormRadioTrait
{
    public static function radio($field, $title, $value = '')
    {
        return new Radio($field, $title, (string)$value);
    }
}