<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Select;

trait FormSelectTrait
{
    public static function select($field, $title, $value = '')
    {
        $multiple = is_array($value) ? true : false;
        $select = new Select($field, $title, $value);
        $select->multiple($multiple);
        return $select;
    }

    public static function selectMultiple($field, $title, array $value = [])
    {
        return self::select($field, $title, $value);
    }

    public static function selectOne($field, $title, $value = '')
    {
        return self::select($field, $title, (string)$value);
    }
}