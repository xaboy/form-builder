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

namespace FormBuilder\factory;

use FormBuilder\exception\FormBuilderException;
use FormBuilder\Form;
use FormBuilder\ui\elm\components\Option;
use FormBuilder\ui\elm\components\Popover;
use FormBuilder\ui\elm\components\Tooltip;
use FormBuilder\ui\elm\Config;
use FormBuilder\ui\elm\traits\CascaderFactoryTrait;
use FormBuilder\ui\elm\traits\CheckBoxFactoryTrait;
use FormBuilder\ui\elm\traits\ColorPickerFactoryTrait;
use FormBuilder\ui\elm\traits\DatePickerFactoryTrait;
use FormBuilder\ui\elm\traits\FrameFactoryTrait;
use FormBuilder\ui\elm\traits\FormStyleFactoryTrait;
use FormBuilder\ui\elm\traits\HiddenFactoryTrait;
use FormBuilder\ui\elm\traits\InputFactoryTrait;
use FormBuilder\ui\elm\traits\InputNumberFactoryTrait;
use FormBuilder\ui\elm\traits\RadioFactoryTrait;
use FormBuilder\ui\elm\traits\RateFactoryTrait;
use FormBuilder\ui\elm\traits\SelectFactoryTrait;
use FormBuilder\ui\elm\traits\SliderFactoryTrait;
use FormBuilder\ui\elm\traits\SwitchesFactoryTrait;
use FormBuilder\ui\elm\traits\TimePickerFactoryTrait;
use FormBuilder\ui\elm\traits\TreeFactoryTrait;
use FormBuilder\ui\elm\traits\UploadFactoryTrait;
use FormBuilder\ui\elm\traits\ValidateFactoryTrait;

abstract class Elm
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
     * 组件提示消息配置 Popover
     *
     * @return Popover
     */
    public static function popover()
    {
        return new Popover();
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
        return Form::elm($action, $rule, $config);
    }
}