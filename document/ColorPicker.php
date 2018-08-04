<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

/**
 * Checkbox 单选框组件方法说明
 * 方法 返回值 方法名(参数) 注释
 * @method $this size(String $size) 多选框组的尺寸，可选值为 large、small、default 或者不设置
 * @method $this required($message = null, $trigger = 'change') 设置为必选项
 * @method $this value($value) 设置value
 */

//单选框
$checkbox = \FormBuilder\Form::checkbox('is_show','是否显示',1)->options([
    ['label'=>'显示','value'=>1,'disabled'=>false],
    ['label'=>'隐藏','value'=>0,'disabled'=>false]
]);

$checkbox = \FormBuilder\Form::checkbox('is_show','是否显示',1)
    ->option(1,'显示',false)
    ->option(0,'隐藏',false);