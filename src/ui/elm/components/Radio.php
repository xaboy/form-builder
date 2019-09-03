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

namespace Xaboy\FormBuilder\ui\elm\components;


use Xaboy\FormBuilder\driver\FormOptionsComponent;
use Xaboy\FormBuilder\factory\Elm;

/**
 * 单选框组件
 * Class Radio
 *
 * @method $this size(string $size) 单选框组尺寸，仅对按钮形式的 Radio 或带有边框的 Radio 有效, 可选值: medium / small / mini
 * @method $this disabled(bool $disabled) 是否禁用, 默认值: false
 * @method $this textColor(string $textColor) 按钮形式的 Radio 激活时的文本颜色, 默认值: #ffffff
 * @method $this fill(string $fill) 按钮形式的 Radio 激活时的填充色和边框色, 默认值: #409EFF
 */
class Radio extends FormOptionsComponent
{
    protected $selectComponent = true;

    protected static $propsRule = [
        'size' => 'string',
        'disabled' => 'bool',
        'textColor' => 'string',
        'fill' => 'string',
    ];

    public function createValidate()
    {
        return Elm::validateStr();
    }

    public function createValidateNum()
    {
        return Elm::validateNum();
    }

    /**
     * 按钮样式
     *
     * @param bool $button
     * @return $this
     */
    public function button($button = true)
    {
        if ($button)
            $this->props['type'] = 'button';
        else
            unset($this->props['type']);
        return $this;
    }
}