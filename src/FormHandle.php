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

    protected $formContentType;

    protected $headers = [];

    protected $fieldTitles = [];

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

    public function getFieldTitle($field)
    {
        return isset($this->fieldTitles[$field]) ? $this->fieldTitles[$field] : null;
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
                $params = $method->getParameters();
                $flag = true;
                if (isset($params[0]) && ($dep = $params[0]->getClass())) {
                    if (in_array('FormBuilder\\Contract\\FormComponentInterface', $dep->getInterfaceNames())) {
                        $componentClass = $dep->getName();
                        $value = $method->invokeArgs($this, [new $componentClass($field, $this->getFieldTitle($field))]);
                        $flag = false;
                    }
                }
                if ($flag) $value = $method->invoke($this);
                if (is_array($value) || Util::isComponent($value))
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
        if (!is_null($this->title)) $form->setTitle($this->title)->headers($this->headers);
        $formData = $this->getFormData();
        if (is_array($formData)) $form->formData($formData);
        if ($this->formContentType) $form->setFormContentType($this->formContentType);
        $config = $this->getFormConfig();
        if ($config) $form->setConfig($config);
        return $form;
    }

    /**
     * @return string
     */
    public function view()
    {
        return $this->form()->view();
    }
}