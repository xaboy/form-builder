<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Test;

use FormBuilder\Form;

require_once 'vendor/autoload.php';

date_default_timezone_set('asia/Shanghai');

//input组件
$input = Form::input('goods_name','商品名称');

//日期区间选择组件
$dateRange = Form::dateRange('limit_time','区间日期', strtotime('- 10 day'),time());

//省市二级联动组件
$cityArea = Form::city('address','收货地址',[
    '陕西省','西安市'
]);

//创建form
$form = Form::create('/save.php',[
    $input,$dateRange,$cityArea
]);

$html = $form->setMethod('get')->setTitle('编辑商品')->view();

//输出form页面
echo $html;
