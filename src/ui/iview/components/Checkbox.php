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

namespace Xaboy\FormBuilder\ui\iview\components;


use Xaboy\FormBuilder\driver\FormOptionsComponent;
use Xaboy\FormBuilder\factory\Iview;

/**
 * 复选框组件
 * Class Checkbox
 *
 * @method $this size(string $size) 多选框组的尺寸，可选值为 large、small、default 或者不设置
 */
class Checkbox extends FormOptionsComponent
{
    protected $defaultValue = [];

    protected $selectComponent = true;

    protected static $propsRule = [
        'size' => 'string'
    ];

    /**
     * @param array $value
     * @return $this
     */
    public function value($value)
    {
        $this->value = (array)$value;
        return $this;
    }

    public function createValidate()
    {
        return Iview::validateArr();
    }
}