# form-builder
使用PHP快速创建现代化的form表单，包含复选框、单选框、输入框、下拉选择框等元素以及,省市区三级联动,时间选择,日期选择,颜色选择,文件/图片上传等功能。


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