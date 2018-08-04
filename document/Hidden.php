<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

/**
 * Frame 框架组件方法说明
 * 方法 返回值 方法名(参数) 注释
 * @method $this type(String $type) frame类型, 有input, file, image, 默认为input
 * @method $this src(String $src) iframe地址
 * @method $this maxLength(int $length) value的最大数量, 默认无限制
 * @method $this icon(String $icon) 打开弹出框的按钮图标
 * @method $this height(String $height) 弹出框高度
 * @method $this width(String $width) 弹出框宽度
 * @method $this spin(Boolean $bool) 是否显示加载动画, 默认为 true
 * @method $this frameTitle(String $title) 弹出框标题
 * @method $this handleIcon(Boolean $bool) 操作按钮的图标, 设置为false将不显示, 设置为true为默认的预览图标, 类型为file时默认为false, image类型默认为true
 * @method $this allowRemove(Boolean $bool) 是否可删除, 设置为false是不显示删除按钮
 * @method $this value($value) 设置value
 */

//多个图片选择
$frameImages = \FormBuilder\Form::frameImages('images','图片选择',[]);
//多个文件选择
$frameFiles = \FormBuilder\Form::frameFiles('files','文件选择',[]);
//多个图标选择,用','隔开
$frameInputs = \FormBuilder\Form::frameInputs('inputs','图标选择',[]);
//单个图片选择
$frameFileOne = \FormBuilder\Form::frameFileOne('images','图片选择','');
//单个文件选择
$frameFileOne = \FormBuilder\Form::frameFileOne('files','文件选择','');
//单个图标选择
$frameFileOne = \FormBuilder\Form::frameFileOne('inputs','图标选择','');
