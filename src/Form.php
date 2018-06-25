<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder;

use FormBuilder\components\Cascader;
use FormBuilder\traits\form\FormCascaderTrait;
use FormBuilder\traits\form\FormCheckBoxTrait;
use FormBuilder\traits\form\FormColorPickerTrait;
use FormBuilder\traits\form\FormDatePickerTrait;
use FormBuilder\traits\form\FormFrameTrait;
use FormBuilder\traits\form\FormHiddenTrait;
use FormBuilder\traits\form\FormInputNumberTrait;
use FormBuilder\traits\form\FormInputTrait;
use FormBuilder\traits\form\FormRadioTrait;
use FormBuilder\traits\form\FormRateTrait;
use FormBuilder\traits\form\FormSelectTrait;
use FormBuilder\traits\form\FormSliderTrait;
use FormBuilder\traits\form\FormSwitchesTrait;
use FormBuilder\traits\form\FormTimePickerTrait;
use FormBuilder\traits\form\FormUploadTrait;

class Form
{
    use FormColorPickerTrait,
        FormFrameTrait,
        FormInputNumberTrait,
        FormRadioTrait,
        FormRateTrait,
        FormSelectTrait,
        FormSwitchesTrait,
        FormUploadTrait,
        FormCheckBoxTrait,
        FormDatePickerTrait,
        FormInputTrait,
        FormSliderTrait,
        FormCascaderTrait,
        FormHiddenTrait,
        FormTimePickerTrait;

    /**
     * 三级联动 加载省市数据
     * @var bool
     */
    protected $loadCityData = false;


    /**
     * 三级联动 加载省市区数据
     * @var bool
     */
    protected $loadCityAreaData = false;

    protected $components = [];

    protected $fields = [];

    protected $script = [];

    protected $successScript = '';

    /**
     * 网页标题
     * @var string
     */
    protected $title = 'formBuilder';

    /**
     * 提交地址
     * @var string
     */
    protected $action = '';

    /**
     * 提交方式
     * @var string
     */
    protected $method = 'post';

    /**
     * 表单配置
     * @var array|mixed
     */
    protected $config = [];

    /**
     * Form constructor.
     * @param string $action 提交地址
     * @param array $components 组件
     */
    public function __construct($action, array $components = [])
    {
        foreach ($components as $component){
            $this->append($component);
        }
        $this->action = $action;
        $config = require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config' . DIRECTORY_SEPARATOR . 'config.php';
        $this->setSuccessScript($config['formSuccessScript']);
        $this->config = $config['form'];
        $this->script = $config['script'];
    }

    /**
     * 修改配置
     * @param array $config
     * @return $this
     */
    public function config(array $config)
    {
        $this->config = array_merge($this->config, $config);
        return $this;
    }

    /**
     * 获取配置参数
     * @param String $configName
     * @param $default
     * @return array|mixed|string
     */
    public function getConfig($configName = '', $default = '')
    {
        $config = $this->config;
        if (!$configName) return $config;
        $configNameList = explode('.', $configName);
        $count = count($configNameList);
        foreach ($configNameList as $k => $cn) {
            if (!isset($config[$cn]))
                return $default;
            else if (($k + 1) == $count)
                return $config[$cn];
            else
                $config = $config[$cn];
        }
        return $default;
    }

    /**
     * @return string
     */
    public function getSuccessScript()
    {
        return $this->successScript;
    }

    /**
     * 表单提交后成功执行的js地址
     * formCreate.formSuccess(formData,$f)
     * @param string $successScript
     * @return $this
     */
    public function setSuccessScript($successScript)
    {
        $this->successScript = $successScript;
        return $this;
    }


    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * 提交地址
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * 提交方式
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * 标题
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }


    /**
     * 追加组件
     * @param FormComponentDriver $component
     * @return $this
     */
    public function append(FormComponentDriver $component)
    {
        $field = $component->getField();
        if(!isset($this->components[$field]))
            $this->fields[] = $field;
        $this->components[$field] = $component;
        return $this;
    }

    /**
     * 开头插入组件
     * @param FormComponentDriver $component
     * @return $this
     */
    public function prepend(FormComponentDriver $component)
    {
        $field = $component->getField();
        if(!isset($this->components[$field]))
            array_unshift($this->fields, $field);
        $this->components[$field] = $component;
        return $this;
    }

    /**
     * 获得表单规则
     * @return array
     */
    public function getRules()
    {
        $rules = [];
        foreach ($this->fields as $field) {
            $component = $this->components[$field];
            if (!($component instanceof FormComponentDriver))
                continue;

            $loadData = $this->loadCityData == true && $this->loadCityAreaData == true;
            if ($loadData == false && $component instanceof Cascader) {
                $type = $component->getType();
                if ($type == Cascader::TYPE_CITY)
                    $this->loadCityData = true;
                else if ($type == Cascader::TYPE_CITY_AREA)
                    $this->loadCityAreaData = true;
            }
            $rules[] = $component->build();
        }
        return $rules;
    }


    /**
     * 获取表单视图
     * @return string
     */
    public function view()
    {
        ob_start();
        $form = $this;
        $rule = $this->getRules();
        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'form.php';
        $html = ob_get_clean();
        return $html;
    }

    /**
     * 获取表单生成器所需全部js
     * @return string
     */
    public static function script()
    {
        $config = require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config' . DIRECTORY_SEPARATOR . 'config.php';
        return implode("\r\n", $config['script']);
    }

    /**
     * 获取生成表单的js代码
     * @return string
     */
    public function formScript()
    {
        ob_start();
        $form = $this;
        $rule = $this->getRules();
        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'formScript.php';
        $script = ob_get_clean();
        return $script;

    }

    /**
     * 获取表单生成器全部js
     * @return string
     */
    public function getScript()
    {
        $_script = $this->script;
        $script = [
            $_script['iview-css'],
            $_script['jq'],
            $_script['vue'],
            $_script['iview'],
            $_script['form-create']
        ];
        if ($this->loadCityAreaData == true)
            $script[] = $_script['city-area-data'];
        if ($this->loadCityData == true)
            $script[] = $_script['city-data'];
        return implode("\r\n", $script);
    }

    /**
     * 生成表单快捷方法
     * @param $action
     * @param array $components
     * @return Form
     */
    public static function create($action, array $components = [])
    {
        return new self($action, $components);
    }
}