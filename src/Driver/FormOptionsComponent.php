<?php
/**
 * PHP表单生成器
 *
 * @package  FormBuilder
 * @author   xaboy <xaboy2005@qq.com>
 * @version  2.0
 * @license  MIT
 * @link     https://github.com/xaboy/form-builder
 */

namespace FormBuilder\Driver;


use FormBuilder\Rule\OptionsRule;

abstract class FormOptionsComponent extends FormComponent
{
    use OptionsRule;

    public function __construct($field, $title, $value = null)
    {
        parent::__construct($field, $title, $value);
    }

    public function build()
    {
        $rule = parent::build();

        return array_merge($rule, $this->parseOptionsRule());
    }
}