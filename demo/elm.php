<?php

namespace App;


require '../vendor/autoload.php';

use FormBuilder\Factory\Elm;
use FormBuilder\Handle\ElmFormHandle;
use FormBuilder\UI\Elm\Components\Rate;
use FormBuilder\UI\Iview\Components\DatePicker;


class GoodsForm extends ElmFormHandle
{
    protected $action = 'save.php';
    protected $title = '测试 Handle';
    protected $fieldTitles = [
        'start_time' => '开启时间',
        'star' => '点赞'
    ];

    protected $scene = 'get';

    protected function getScene()
    {
        $this->except = ['goods_name'];
    }

    public function goods_name_field()
    {
        return Elm::input('goods_name', '商品名称')->required();
    }

    public function goods_info_field()
    {
        return Elm::textarea('goods_info', '商品简介');
    }

    public function is_open_field()
    {
        return Elm::switches('is_open', '是否开启');
    }

    public function id_field()
    {
        return Elm::hidden('1', '1');
    }

    public function frame_field()
    {
        return Elm::frameFile('as', 'asd', 'afsdfasdf');
    }

    public function test_field()
    {
        return Elm::uploadFiles('aaa', 'aaa', 'bbb', [1])->required();
    }

    public function row_field()
    {
        return [
            'type' => 'row',
            'children' => [
                [
                    'type' => 'input',
                    'field' => 'row',
                    'title' => 'test Row',
                    'value' => '123',
                    'col' => [
                        'span' => 12
                    ]
                ],
                Elm::input('row2', 'row2', 'asdf')->col(12)
            ],
            'native' => true
        ];
    }

    /**
     * 通过依赖注入方式生成组件
     *
     * @param DatePicker $date
     * @return DatePicker
     */
    public function start_time_field(DatePicker $date)
    {
        return $date->required()->info('asdfasdfasdfsf');
    }

    public function starField(Rate $rate)
    {
        return $rate;
    }

    protected function getFormConfig()
    {
        $config = Elm::config();
        $config->createResetBtn()->show(true);

        return $config;
    }

    protected function getFormData()
    {
        return [
            'goods_name' => 'goods_name123',
            'asdf' => 'asdfafd',
            'is_open' => '0',
            'goods_info' => "asdf\r\nadfa",
            'star' => 0,
            'row' => 'adsfasdfasd'
        ];
    }
}

$formHtml = (new GoodsForm())->view();
//$formHtml = (new GoodsForm())->form()->view();

echo $formHtml;