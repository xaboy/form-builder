<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

/**
 * DatePicker 日期组件方法说明
 * 方法 返回值 方法名(参数) 注释
 * @method $this type(String $type) 显示类型，可选值为 date、daterange、datetime、datetimerange、year、month
 * @method $this format(String $format) 展示的日期格式, 默认为yyyy-MM-dd HH:mm:ss
 * @method $this placement(String $placement) 日期选择器出现的位置，可选值为top, top-start, top-end, bottom, bottom-start, bottom-end, left, left-start, left-end, right, right-start, right-end, 默认为bottom-start
 * @method $this placeholder(String $placeholder) 占位文本
 * @method $this confirm(Boolean $bool) 是否显示底部控制栏，开启后，选择完日期，选择器不会主动关闭，需用户确认后才可关闭, 默认为false
 * @method $this size(String $size) 尺寸，可选值为large、small、default或者不设置
 * @method $this disabled(Boolean $bool) 是否禁用选择器
 * @method $this clearable(Boolean $bool) 是否显示清除按钮
 * @method $this readonly(Boolean $bool) 完全只读，开启后不会弹出选择器，只在没有设置 open 属性下生效
 * @method $this editable(Boolean $bool) 文本框是否可以输入, 默认为false
 * @method $this transfer(Boolean $bool) 是否将弹层放置于 body 内，在 Tabs、带有 fixed 的 Table 列内使用时，建议添加此属性，它将不受父级样式影响，从而达到更好的效果, 默认为false
 * @method $this splitPanels(Boolean $bool) 开启后，左右面板不联动，仅在 daterange 和 datetimerange 下可用。
 * @method $this showWeekNumbers(Boolean $bool) 开启后，可以显示星期数。
 * @method $this value($value) 设置value
 */

//日期选择
$date = \FormBuilder\Form::date('date','日期选择',time());
//日期区间选择
$dateRange = \FormBuilder\Form::dateRange('dateRange','日期区间选择',time(),strtotime('+ 1 day'));
//日期+时间选择
$dateTime = \FormBuilder\Form::dateTime('dateTime','日期+时间选择',time());
//日期+时间区间选择
$dateTimeRange = \FormBuilder\Form::dateTimeRange('dateTimeRange','日期+时间区间选择',time(),strtotime('+ 1 day'));
