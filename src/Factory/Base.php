<?php


namespace FormBuilder\Factory;


use FormBuilder\Driver\CustomComponent;

abstract class Base
{
    /**
     * 创建自定义组件
     *
     * @param string $type
     * @return CustomComponent
     */
    public static function createComponent($type)
    {
        return new CustomComponent($type);
    }
}