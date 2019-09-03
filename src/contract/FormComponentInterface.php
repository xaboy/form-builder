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

namespace Xaboy\FormBuilder\contract;


interface FormComponentInterface
{

    /**
     * 获取组件的生成规则
     *
     * @return array
     */
    public function build();
}