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

namespace FormBuilder\ui\iview\style;


use FormBuilder\contract\FormComponentInterface;

/**
 * row栅格规则
 *
 * Class Row
 */
class Row implements FormComponentInterface
{
    protected $rule;

    public function __construct(array $rule = [])
    {
        $this->rule = $rule;
    }

    /**
     * 栅格间距，单位 px，左右平分
     *
     * @param int $gutter
     */
    public function gutter($gutter)
    {
        $this->rule['gutter'] = (float)$gutter;
    }

    /**
     * 布局模式，可选值为flex或不选，在现代浏览器下有效
     *
     * @param string $type
     */
    public function type($type)
    {
        $this->rule['type'] = $type;
    }

    /**
     * flex 布局下的垂直对齐方式，可选值为top、middle、bottom
     *
     * @param string $align
     */
    public function align($align)
    {
        $this->rule['align'] = $align;
    }

    /**
     * flex 布局下的水平排列方式，可选值为start、end、center、space-around、space-between
     *
     * @param string $justify
     */
    public function justify($justify)
    {
        $this->rule['justify'] = $justify;
    }

    /**
     * 自定义的class名称
     *
     * @param string $className
     */
    public function className($className)
    {
        $this->rule['className'] = $className;
    }

    /**
     * @return object
     */
    public function build()
    {
        return (object)$this->rule;
    }

}