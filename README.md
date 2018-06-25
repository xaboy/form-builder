# form-builder
使用PHP快速创建现代化的form表单，包含复选框、单选框、输入框、下拉选择框等元素以及,省市区三级联动,时间选择,日期选择,颜色选择,文件/图片上传等功能。

<p align="center">
    <img src="https://img.shields.io/badge/License-MIT-yellow.svg" alt="MIT" />
  <a href="https://github.com/xaboy">
    <img src="https://img.shields.io/badge/Author-xaboy-blue.svg" alt="xaboy" />
  </a>
  <a href="https://packagist.org/packages/xaboy/form-builder">
    <img src="https://img.shields.io/packagist/v/xaboy/form-builder.svg" alt="version" />
  </a>
  <a href="https://packagist.org/packages/xaboy/form-builder">
    <img src="https://img.shields.io/packagist/php-v/xaboy/form-builder.svg" alt="php version" />
  </a>
</p>

## 安装
`composer require xaboy/form-builder`

## 示例

![https://raw.githubusercontent.com/xaboy/form-builder/master/demo.jpg](https://raw.githubusercontent.com/xaboy/form-builder/master/demo.jpg)


各组件配置属性 [点击查看](https://github.com/xaboy/form-builder/tree/master/src/components)

请在 `config/config.php`中配置`formSuccessScript`属性。设置为form提交成功后的js代码或js地址,重新`window.formCreate.formSuccess`方法(带`<script>`标签) 或者直接修改`formScript.php`

```php

namespace Test;
use FormBuilder\Form;

//input组件
$input = Form::input('goods_name','商品名称');

//日期区间选择组件
$dateRange = Form::dateRange('limit_time','区间日期',[
    strtotime('- 10 day'),
    time()
]);

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
```