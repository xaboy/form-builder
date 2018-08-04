<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

/**
 * Input Input组件方法说明
 * 方法 返回值 方法名(参数) 注释
 * @method $this type(String $type) 输入框类型，可选值为 text、password、textarea、url、email、date;
 * @method $this size(String $size) 输入框尺寸，可选值为large、small、default或者不设置;
 * @method $this placeholder(String $placeholder) 占位文本
 * @method $this clearable(Boolean $bool) 是否显示清空按钮, 默认为false
 * @method $this disabled(Boolean $bool) 设置输入框为禁用状态, 默认为false
 * @method $this readonly(Boolean $bool) 设置输入框为只读, 默认为false
 * @method $this maxlength(int $length) 最大输入长度
 * @method $this icon(String $icon) 输入框尾部图标，仅在 text 类型下有效
 * @method $this rows(int $rows) 文本域默认行数，仅在 textarea 类型下有效, 默认为2
 * @method $this number(Boolean $bool) 将用户的输入转换为 Number 类型, 默认为false
 * @method $this autofocus(Boolean $bool) 自动获取焦点, 默认为false
 * @method $this autocomplete(Boolean $bool) 原生的自动完成功能, 默认为false
 * @method $this spellcheck(Boolean $bool) 原生的 spellcheck 属性, 默认为false
 * @method $this wrap(String $warp) 原生的 wrap 属性，可选值为 hard 和 soft, 默认为soft
 * @method $this autoSize(Number $minRows, Number $maxRows) 自适应内容高度，仅在 textarea 类型下有效
 * @method $this required($message = null, $trigger = 'blur') 组件的值为必填
 * @method $this value($value) 设置value
 */

$text = \FormBuilder\Form::text('goods_name','商品名称');
$password = \FormBuilder\Form::password('password','密码');
$textarea = \FormBuilder\Form::textarea('textarea','简介');
$url = \FormBuilder\Form::url('url','链接');
$email = \FormBuilder\Form::email('email','邮箱');
$idate = \FormBuilder\Form::idate('idate','日期');
