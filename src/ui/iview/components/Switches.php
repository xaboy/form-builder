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

namespace FormBuilder\ui\iview\components;


use FormBuilder\driver\FormComponent;
use FormBuilder\factory\Iview;

/**
 * 开关组件
 * Class Switches
 *
 * @method $this size(string $size) 开关的尺寸，可选值为large、small、default或者不写。建议开关如果使用了2个汉字的文字，使用 large。
 * @method $this disabled(bool $bool) 禁用开关, 默认为false
 * @method $this trueValue(string $value) 选中时的值，默认为1
 * @method $this falseValue(string $value) 没有选中时的值，默认为0
 */
class Switches extends FormComponent
{
    protected $selectComponent = true;

    protected $defaultProps = [
        'trueValue' => '1',
        'falseValue' => '0',
        'slot' => []
    ];

    protected static $propsRule = [
        'size' => 'string',
        'disabled' => 'bool',
        'trueValue' => 'string',
        'falseValue' => 'string'
    ];

    public function getRuleType()
    {
        return 'switch';
    }

    /**
     * 自定义显示打开时的内容
     *
     * @param string $open
     * @return $this
     */
    public function openStr($open)
    {
        $this->props['slot']['open'] = (string)$open;
        return $this;
    }

    /**
     * 自定义显示关闭时的内容
     *
     * @param string $close
     * @return $this
     */
    public function closeStr($close)
    {
        $this->props['slot']['open'] = (string)$close;
        return $this;
    }

    /**
     * @return array
     */
    public function build()
    {
        $rule = parent::build();
        if (!count($rule['props']->slot)) unset($rule['props']->slot);

        return $rule;
    }

    public function createValidate()
    {
        return Iview::validateStr();
    }

    public function createValidateNum()
    {
        return Iview::validateNum();
    }

}