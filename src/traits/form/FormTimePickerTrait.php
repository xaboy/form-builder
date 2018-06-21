<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\TimePicker;

trait FormTimePickerTrait
{
    public static function timePicker($field, $title, $value = '', $type = TimePicker::TYPE_TIME)
    {
        $timePicker = new TimePicker($field, $title, $value);
        $timePicker->type($type);
        return $timePicker;
    }

    public static function time($field, $title, $value = '')
    {
        return self::timePicker($field, $title, (string)$value);
    }

    public static function timeRange($field, $title, $startTime = '', $endTime = '')
    {
        return self::timePicker($field, $title, [(string)$startTime, (string)$endTime], TimePicker::TYPE_TIME_RANGE);
    }
}