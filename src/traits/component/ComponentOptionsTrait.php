<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\component;


use FormBuilder\components\Option;

trait ComponentOptionsTrait
{
    protected $options = [];

    /**
     * 设置的选项
     * @param $value
     * @param $label
     * @param bool $disabled
     */
    public function option($value, $label, $disabled = false)
    {
        $this->options[] = new Option($value, $label, $disabled);
    }


    /**
     * 批量设置的选项
     * @param array $options
     * @param bool $disabled
     * @return $this
     */
    public function options(array $options, $disabled = false)
    {
        $disabled = (bool)$disabled;
        foreach ($options as $option) {
            if ($option instanceof Option)
                $this->options[] = $option;
            else
                $this->option(
                    $option['value'],
                    $option['label'],
                    isset($option['disabled']) ? $option['disabled'] : $disabled
                );
        }
        return $this;
    }
}