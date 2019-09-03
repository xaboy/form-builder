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

namespace Xaboy\FormBuilder\factory;

use Xaboy\FormBuilder\exception\FormBuilderException;
use Xaboy\FormBuilder\Form;
use Xaboy\FormBuilder\ui\iview\components\Option;
use Xaboy\FormBuilder\ui\iview\components\Poptip;
use Xaboy\FormBuilder\ui\iview\components\Tooltip;
use Xaboy\FormBuilder\ui\iview\Config;
use Xaboy\FormBuilder\ui\iview\traits\CascaderFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\CheckBoxFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\ColorPickerFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\DatePickerFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\FrameFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\FormStyleFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\HiddenFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\InputFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\InputNumberFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\RadioFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\RateFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\SelectFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\SliderFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\SwitchesFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\TimePickerFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\TreeFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\UploadFactoryTrait;
use Xaboy\FormBuilder\ui\iview\traits\ValidateFactoryTrait;

abstract class Iview
{
    use CascaderFactoryTrait;
    use CheckBoxFactoryTrait;
    use ColorPickerFactoryTrait;
    use DatePickerFactoryTrait;
    use FrameFactoryTrait;
    use HiddenFactoryTrait;
    use InputNumberFactoryTrait;
    use InputFactoryTrait;
    use RadioFactoryTrait;
    use RateFactoryTrait;
    use SliderFactoryTrait;
    use SelectFactoryTrait;
    use FormStyleFactoryTrait;
    use SwitchesFactoryTrait;
    use TimePickerFactoryTrait;
    use TreeFactoryTrait;
    use UploadFactoryTrait;
    use ValidateFactoryTrait;

    /**
     * 获取选择类组件 option 类
     *
     * @param string|number $value
     * @param string $label
     * @param bool $disabled
     * @return Option
     */
    public static function option($value, $label = '', $disabled = false)
    {
        return new Option($value, $label, $disabled);
    }

    /**
     * 全局配置
     *
     * @param array $config
     * @return Config
     */
    public static function config(array $config = [])
    {
        return new Config($config);
    }

    /**
     * 组件提示消息配置 Poptip
     *
     * @return Poptip
     */
    public static function poptip()
    {
        return new Poptip();
    }

    /**
     * 组件提示消息配置 Tooltip
     *
     * @return Tooltip
     */
    public static function tooltip()
    {
        return new Tooltip();
    }


    /**
     * 创建表单
     *
     * @param string $action
     * @param array $rule
     * @param array $config
     * @return Form
     * @throws FormBuilderException
     */
    public static function createForm($action = '', $rule = [], $config = [])
    {
        return Form::iview($action, $rule, $config);
    }
}