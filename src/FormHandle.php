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

namespace FormBuilder;


use FormBuilder\Contract\ConfigInterface;
use FormBuilder\Contract\FormComponentInterface;

/**
 * 表单生成类
 *
 * Class FormHandle
 * @package FormBuilder
 */
abstract class FormHandle
{
    protected $action = '';

    protected $method = 'POST';

    protected $title;

    protected $headers = [];

    /**
     * 表单 UI
     *
     * @return mixed
     */
    abstract protected function ui();

    /**
     * 获取表单数据
     * @return array
     */
    protected function getFormData()
    {
        return [];
    }

    /**
     * 获取表单配置
     *
     * @return mixed|array|ConfigInterface
     */
    protected function getFormConfig()
    {
        return;
    }

    /**
     * 获取表单组件
     *
     * @return array
     */
    protected function getFormRule()
    {
        $reflectionClass = new \ReflectionClass($this);
        $methods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);
        $rule = [];
        foreach ($methods as $method) {
            $field = preg_replace('/^(.+)(Field|_field)$/', '$1', $method->name);
            if ($field != $method->name) {
                $value = $method->invoke($this);
                if (is_array($value) || $value instanceof FormComponentInterface)
                    $rule[] = $value;
            }
        }

        return $rule;
    }

    /**
     * 创建表单
     *
     * @return  Form
     */
    protected function createForm()
    {
        $ui = lcfirst($this->ui());
        return call_user_func_array(['FormBuilder\\Form', $ui], $this->getParams());
    }

    /**
     * @return array
     */
    protected function getParams()
    {
        $params = [$this->action, $this->getFormRule()];
        $config = $this->getFormConfig();
        if (is_array($config) || $config instanceof ConfigInterface)
            $params[] = $config;

        return $params;
    }

    /**
     * 获取表单
     *
     * @return Form
     */
    public function form()
    {
        $form = $this->createForm()->setMethod($this->method);
        if (!is_null($this->title)) $form->setTitle($this->title);
        $formData = $this->getFormData();
        if (is_array($formData)) $form->formData($formData);
        return $form;
    }

    /**
     * @return string
     */
    public function view()
    {
        return $this->getForm()->view();
    }
}