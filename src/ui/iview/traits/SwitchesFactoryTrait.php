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

namespace FormBuilder\ui\iview\traits;


use FormBuilder\ui\iview\components\Switches;

trait SwitchesFactoryTrait
{
    /**
     * 开关组件
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @return Switches
     */
    public static function switches($field, $title, $value = '0')
    {
        return new Switches($field, $title, $value);
    }
}