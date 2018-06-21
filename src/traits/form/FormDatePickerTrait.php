<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\DatePicker;

trait FormDatePickerTrait
{
    public static function datePicker($field, $title, $value = '', $type = DatePicker::TYPE_DATE)
    {
        $datePicker = new DatePicker($field, $title, $value);
        $datePicker->type($type);
        return $datePicker;
    }

    public static function date($field, $title, $value = '')
    {
        return self::datePicker($field, $title, (string)$value, DatePicker::TYPE_DATE);
    }

    public static function dateRange($field, $title, $startDate = '', $endDate = '')
    {
        return self::datePicker($field, $title, [(string)$startDate, (string)$endDate], DatePicker::TYPE_DATE_RANGE);
    }

    public static function dateTime($field, $title, $value = '')
    {
        return self::datePicker($field, $title, (string)$value, DatePicker::TYPE_DATE_TIME);
    }

    public static function dateTimeRange($field, $title, $startDate = '', $endDate = '')
    {
        return self::datePicker($field, $title, [(string)$startDate, (string)$endDate], DatePicker::TYPE_DATE_TIME_RANGE);
    }

    public static function year($field, $title, $value = '')
    {
        return self::datePicker($field, $title, (string)$value, DatePicker::TYPE_YEAR);
    }

    public static function month($field, $title, $value = '')
    {
        return self::datePicker($field, $title, (string)$value, DatePicker::TYPE_MONTH);
    }
}