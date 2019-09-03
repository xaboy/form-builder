<?php
/**
 * PHP表单生成器
 *
 * @package  FormBuilder
 * @author   xaboy <xaboy2005@qq.com>
 * @version  2.0
 * @license  MIT
 * @link     https://github.com/xaboy/form-builder
 */

namespace Xaboy\FormBuilder\rule;


use Xaboy\FormBuilder\contract\ValidateInterface;

trait ValidateRule
{
    /**
     * 组件验证规则
     *
     * @var array
     */
    protected $validate = [];

    public function validate(array $validates)
    {
        $this->validate = $validates;
        return $this;
    }

    /**
     * @param array|ValidateInterface $validate
     * @return $this
     */
    public function appendValidate($validate)
    {
        $this->validate[] = $validate;
        return $this;
    }

    public function appendValidates(array $validates)
    {
        $this->validate = array_merge($this->validate, $validates);
        return $this;
    }

    protected function getValidate()
    {
        return $this->validate;
    }

    protected function parseValidate()
    {
        $validate = [];
        foreach ($this->validate as $value) {
            $validate[] = $value instanceof ValidateInterface ? $value->build() : $value;
        }

        return $validate;
    }

    public function parseValidateRule()
    {
        if (!count($this->validate))
            return [];
        return ['validate' => $this->parseValidate()];
    }
}