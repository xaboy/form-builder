<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

return [
    'form' => [//是否开启行内表单模式
        'inline' => false,
        //表单域标签的位置，可选值为 left、right、top
        'labelPosition' => 'right',
        //表单域标签的宽度，所有的 FormItem 都会继承 Form 组件的 label-width 的值
        'labelWidth' => 125,
        //是否显示校验错误信息
        'showMessage' => true,
        //原生的 autocomplete 属性，可选值为 off 或 on
        'autocomplete' => 'off'
    ],
    //表单提交成功执行脚本地址
    'formSuccessScript' => '',
    'script' => [
        'jq' => '<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>',
        'vue' => '<script src="https://cdn.bootcss.com/vue/2.5.13/vue.min.js"></script>',
        //iview 版本 2.14.3
        'iview-css' => '<link href="https://cdn.jsdelivr.net/npm/iview@2.14.3/dist/styles/iview.css" rel="stylesheet">',
        'iview' => '<script src="https://cdn.jsdelivr.net/npm/iview@2.14.3/dist/iview.min.js"></script>',
        //form-create 版本 1.3.1
        'form-create' => '<script src="https://cdn.jsdelivr.net/npm/form-create@1.3.1/dist/form-create.min.js"></script>',
        'city-data' => '<script src="https://cdn.jsdelivr.net/npm/form-create/district/province_city.js"></script>',
        'city-area-data' => '<script src="https://cdn.jsdelivr.net/npm/form-create/district/province_city_area.js"></script>'
    ]
];