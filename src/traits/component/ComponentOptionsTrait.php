<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\component;


use FormBuilder\components\Options;

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
        $this->options[] = new Options($value, $label, $disabled);
    }


    /**
     * 批量设置的选项
     * @param array $options
     * @return $this
     */
    public function options(array $options)
    {
        foreach ($options as $option) {
            if ($option instanceof Options)
                $this->options[] = $option;
            else
                $this->option($option[0], $option[1], isset($option[2]) ? $option[2] : true);
        }
        return $this;
    }
}