<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\components;


use FormBuilder\interfaces\FormComponentInterFace;
use FormBuilder\Helper;

class Option implements FormComponentInterFace
{

    protected $props;

    public function __construct($value, $label = '', $disabled = false)
    {
        self::verify($value, $value);
        $value = (string)$value;
        $this->props = compact('label', 'value');
        $this->disabled($disabled);
    }

    public static function verify($value, $label)
    {
        Helper::verifyType($value, ['numeric', 'string', 'null'], 'options.value');
        Helper::verifyType($label, ['numeric', 'string', 'null'], 'options.label');
    }


    public function disabled($disabled = true)
    {
        $disabled = Helper::toType($disabled, 'boolean');
        $this->props['disabled'] = $disabled;
        return $this;
    }

    public function build()
    {
        $props = $this->props;
        if ($props['disabled'] != true)
            unset($props['disabled']);
        return $props;
    }
}