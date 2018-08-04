<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

/**
 * InputNumber 数字输入框组件方法说明
 * 方法 返回值 方法名(参数) 注释
 * @method $this max(float $max) 最大值
 * @method $this min(float $min) 最小值
 * @method $this step(float $step) 每次改变的步伐，可以是小数
 * @method $this size(String $size) 输入框尺寸，可选值为large、small、default或者不填
 * @method $this disabled(Boolean $bool) 设置禁用状态，默认为false
 * @method $this placeholder(String $placeholder) 占位文本
 * @method $this readonly(Boolean $bool) 是否设置为只读，默认为false
 * @method $this editable(Boolean $bool) 是否可编辑，默认为true
 * @method $this precision(int $precision) 数值精度
 * @method $this value($value) 设置value
 */

$number = \FormBuilder\Form::number('sort','排序',1);
