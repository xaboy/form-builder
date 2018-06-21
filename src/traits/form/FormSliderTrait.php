<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Slider;

trait FormSliderTrait
{
    public static function slider($field, $title, $value = 0)
    {
        return new Slider($field, $title, $value);
    }

    public static function sliderRange($field, $title, $start = 0, $end = 0)
    {
        $slider = self::slider($field, $title, [(int)$start, (int)$end]);
        $slider->range(true);
        return $slider;
    }
}