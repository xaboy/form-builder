<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Cascader;

trait FormCascaderTrait
{
    /**
     * 多级联动组件
     * @param $field
     * @param $title
     * @param array $value
     * @param string $type
     * @return Cascader
     */
    public static function cascader($field, $title, array $value = [], $type = Cascader::TYPE_OTHER)
    {
        $cascader = new Cascader($field, $title, $value);
        $cascader->type($type);
        return $cascader;
    }


    /**
     * 省市二级联动
     * @param $field
     * @param $title
     * @param string $province
     * @param string $city
     * @return Cascader
     */
    public static function city($field, $title, $province = '', $city = '')
    {
        return self::cascader($field, $title, [$province, $city], Cascader::TYPE_CITY);
    }


    /**
     * 省市区三级联动
     * @param $field
     * @param $title
     * @param string $province
     * @param string $city
     * @param string $area
     * @return Cascader
     */
    public static function cityArea($field, $title, $province = '', $city = '', $area = '')
    {
        return self::cascader($field, $title, [$province, $city, $area], Cascader::TYPE_CITY_AREA);
    }
}