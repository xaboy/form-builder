# form-builder

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

<p align="center">
PHP表单生成器，快速生成现代化的form表单。包含复选框、单选框、输入框、下拉选择框等元素以及,省市区三级联动,时间选择,日期选择,颜色选择,文件/图片上传等功能。
</p>


#### 表单是使用[form-create](https://github.com/xaboy/form-create) js表单生成器生成

#### 如果对您有帮助，您可以点右上角 "Star" 支持一下 谢谢！
 
#### 本项目还在不断开发完善中,如有建议或问题请[在这里提出](https://github.com/xaboy/form-builder/issues/new)


## 安装
`composer require xaboy/form-builder`

## 示例

![https://raw.githubusercontent.com/xaboy/form-builder/master/demo.jpg](https://raw.githubusercontent.com/xaboy/form-builder/master/demo.jpg)


## 各组件配置属性 [点击查看](https://github.com/xaboy/form-builder/tree/master/src/components)

## 配置表单提交成功的回调
> 请在 `config/config.php`中配置`formSuccessScript`属性。设置为form提交成功后的js代码或js地址,重新`window.formCreate.formSuccess`方法(带`<script>`标签) 或者直接修改`formScript.php`
### 回调方法
```javascript
    formCreate.formSuccess = function(res,$r) {
        //TODO 表单提交后的操作
    }
```
### 配置方法
```php
[
    $form->setSuccessScript('<script src="collback.js"></script>');
    //OR
    $form->setSuccessScript('<script>
        formCreate.formSuccess = function(res,$r) {
            //TODO 表单提交后的操作
        }
    </script>');
]
```


## 代码
```php

namespace Test;
use FormBuilder\Form;

//input组件
$input = Form::input('goods_name','商品名称');

//日期区间选择组件
$dateRange = Form::dateRange(
    'limit_time',
    '区间日期',
    strtotime('- 10 day'),
    time()
);

//省市二级联动组件
$cityArea = Form::city('address','收货地址',[
    '陕西省','西安市'
]);

$checkbox = Form::checkbox('label','表单',[])->options([
    ['value'=>'1','label'=>'好用','disabled'=>true],
    ['value'=>'2','label'=>'方便','disabled'=>true]
]);

//创建form
$form = Form::create('/save.php',[
    $input,$dateRange,$cityArea,$checkbox
]);

$html = $form->setMethod('get')->setTitle('编辑商品')->view();

//输出form页面
echo $html;
```

## 组件
`namespace \FormBuilder\Form`

* **Form::cascader** 三级联动,value为array类型
* **Form::city** 省市二级联动,value为array类型
* **Form::cityArea** 省市区三级联动,value为array类型


* **Form::checkbox** 复选框
* **Form::color** 颜色选择


* **Form::date** 日期选择
* **Form::dateRange** 日期区间选择,value为array类型
* **Form::dateTime** 日期+时间选择
* **Form::dateTimeRange** 日期+时间 区间选择,value为array类型
* **Form::year** 年份选择
* **Form::month** 月份选择


* **Form::frame** frame组件
* **Form::frameInputs** frame组件,input类型,value为array类型
* **Form::frameFiles** frame组件,file类型,value为array类型
* **Form::frameImages** frame组件,image类型,value为array类型
* **Form::frameInputOne** frame组件,input类型,value为string|number类型
* **Form::frameFileOne** frame组件,file类型,value为string|number类型
* **Form::frameImageOne** frame组件,image类型,value为string|number类型


* **Form::hidden** hidden组件
* **Form::number** 数字输入框
* **Form::input** input输入框,其他type: text类型`Form::text`,password类型`Form::password`,textarea类型`Form::textarea`,url类型`Form::url`,email类型`Form::email`,date类型`Form::idate`
* **Form::radio** 单选框
* **Form::rate** 评分组件


* **Form::select** select选择框
* **Form::selectMultiple** select选择框,多选,value为array类型
* **Form::selectOne** select选择框,单选


* **Form::slider** 滑块组件
* **Form::sliderRange** 滑块组件,区间选择,


* **Form::switches** 开关组件


* **Form::timePicker** 
* **Form::time** 时间选择组件
* **Form::timeRange** 时间区间选择组件,value为array类型


* **Form::upload** 上传组件
* **Form::uploadImages** 多图上传组件,value为array类型
* **Form::uploadFiles** 多文件上传组件,value为array类型
* **Form::uploadImageOne** 单图上传组件
* **Form::uploadFileOne** 单文件上传组件

## select,checkbox,radio配置options
* **option($value, $label, $disabled = false)** 单独设置选项
* **options(array $options, $disabled = false)** 批量设置选项
* **setOptions($options, $disabled = false)** 批量设置选项 支持匿名函数


## 输出
`namespace \FormBuilder\Json`

* **Json::succ(msg,data = [])** 表单提交成功
* **Json::fail(errorMsg,data = [])** 表单提交失败
* **Json::uploadSucc(filePath,msg)** 文件/图片上传成功,上传成功后返回文件地址
* **Json::uploadFail(errorMsg)** 文件/图片上传失败
