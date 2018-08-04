<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

/**
 * ColorPicker 颜色选择器组件方法说明
 * 方法 返回值 方法名(参数) 注释
 * @method $this disabled(Boolean $bool) 是否禁用
 * @method $this alpha(Boolean $bool) 是否支持透明度选择, 默认为false
 * @method $this hue(Boolean $bool) 是否支持色彩选择, 默认为true
 * @method $this recommend(Boolean $bool) 是否显示推荐的颜色预设, 默认为false
 * @method $this size(String $size) 尺寸，可选值为large、small、default或者不设置
 * @method $this format(String $format) 颜色的格式，可选值为 hsl、hsv、hex、rgb    String    开启 alpha 时为 rgb，其它为 hex
 * @method $this colors(array $colors) 自定义颜色预设
 * @method $this required($message = null, $trigger = 'change') 设置为必选项
 * @method $this value($value) 设置value
 */

//颜色选择器组件
$colorPicker = \FormBuilder\Form::color('color','选择颜色','#FF7271');
