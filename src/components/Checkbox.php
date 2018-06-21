<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\components;


use FormBuilder\FormComponentDriver;
use FormBuilder\Helper;
use FormBuilder\traits\component\ComponentOptionsTrait;

/**
 * 复选框组件
 * Class Checkbox
 * @package FormBuilder\components
 * @method $this size(String $size) 多选框组的尺寸，可选值为 large、small、default 或者不设置
 */
class Checkbox extends FormComponentDriver
{
    use ComponentOptionsTrait;

    protected $name = 'checkbox';

    protected $value = [];

    protected static $propsRule = [
        'size'=>'string'
    ];

    public function value($value)
    {
        if($value === null) return $this;
        if(!is_array($value))
            $this->value[] = (string)$value;
        else{
            foreach ($value as $v){
                $this->value[] = (string) $v;
            }
        }
        return $this;
    }

    public function required($message = null,$trigger = 'change')
    {
        $this->setRequired(Helper::getVar($message,'请选择'.$this->title),$trigger,'array');
        return $this;
    }

    public function build()
    {
        $options = [];
        foreach ($this->options as $option){
            $options[] = $option->build();
        }
        $value = array_unique($this->value);
        foreach ($value as $k=>$v){
            $value[$k] = (string)$v;
        }
        return [
            'type'=>$this->name,
            'field'=>$this->field,
            'title'=>$this->title,
            'value'=>array_unique($this->value),
            'props'=>(object)$this->props,
            'options'=>$options,
            'validate'=>$this->validate
        ];
    }

}