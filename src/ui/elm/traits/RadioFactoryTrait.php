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

namespace Xaboy\FormBuilder\ui\elm\traits;


use Xaboy\FormBuilder\ui\elm\components\Radio;

trait RadioFactoryTrait
{
    /**
     * 单选框组件
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @return Radio
     */
    public static function radio($field, $title, $value = '')
    {
        return new Radio($field, $title, $value);
    }
}