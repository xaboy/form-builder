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


use FormBuilder\Contract\BootstrapInterface;
use FormBuilder\Contract\ConfigInterface;
use FormBuilder\Contract\FormComponentInterface;
use FormBuilder\Exception\FormBuilderException;
use FormBuilder\UI\Iview\Bootstrap as IViewBootstrap;
use FormBuilder\UI\Elm\Bootstrap as ElmBootstrap;

class Form
{
    protected $loadScript = true;

    protected $headers = [];

    protected $formContentType = 'application/x-www-form-urlencoded';

    /**
     * @var BootstrapInterface
     */
    protected $ui;

    /**
     * @var array|ConfigInterface
     */
    protected $config;

    protected $action;

    protected $method = 'POST';

    protected $title = 'FormBuilder';

    protected $rule;

    protected $dependScript = [
        '<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>',
        '<script src="https://unpkg.com/vue@2.5.13/dist/vue.min.js"></script>',
        '<script src="https://unpkg.com/@form-create/data@1.0.0/dist/province_city.js"></script>',
        '<script src="https://unpkg.com/@form-create/data@1.0.0/dist/province_city_area.js"></script>'
    ];

    /**
     * Form constructor.
     * @param BootstrapInterface $ui
     * @param string $action
     * @param array $rule
     * @param array $config
     * @throws FormBuilderException
     */
    protected function __construct(BootstrapInterface $ui, $action = '', $rule = [], $config = [])
    {
        $this->action = $action;
        $this->rule = $rule;
        $this->config = $config;
        $this->ui = $ui;
        $ui->init($this);
        $this->checkFieldUnique();
    }

    /**
     * @return string
     */
    public function getFormContentType()
    {
        return $this->formContentType;
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = (string)$value;

        return $this;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function headers(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return false|string
     */
    public function parseHeaders()
    {
        return json_encode((object)$this->headers);
    }

    /**
     * @param $formContentType
     * @return $this
     */
    public function setFormContentType($formContentType)
    {
        $this->formContentType = (string)$formContentType;

        return $this;
    }

    public function setDependScript(array $dependScript)
    {
        $this->dependScript = $dependScript;

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;

        return $this;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = (string)$method;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param bool $load
     * @return $this
     */
    public function loadScript($load)
    {
        $this->loadScript = !!$load;
        return $this;
    }

    /**
     * @param array $rule
     * @return $this
     * @throws FormBuilderException
     */
    public function setRule(array $rule)
    {
        $this->rule = $rule;
        $this->checkFieldUnique();
        return $this;
    }

    /**
     * @param array|ConfigInterface $config
     * @return $this
     */
    public function setConfig($config)
    {
        if (is_array($config) || $config instanceof ConfigInterface)
            $this->config = $config;
        return $this;
    }

    /**
     * 追加组件
     *
     * @param $component
     * @return $this
     * @throws FormBuilderException
     */
    public function append($component)
    {
        $this->rule[] = $component;
        $this->checkFieldUnique();
        return $this;
    }

    /**
     * 开头插入组件
     *
     * @param $component
     * @return $this
     * @throws FormBuilderException
     */
    public function prepend($component)
    {
        array_unshift($this->rule, $component);
        $this->checkFieldUnique();
        return $this;
    }

    /**
     * @param $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = (string)$action;
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
     * 隐藏表单提交按钮
     * @return $this
     */
    public function hideSubmitBtn()
    {
        $this->config['submitBtn'] = false;
        return $this;
    }

    /**
     * 显示表单提交按钮
     * @return $this
     */
    public function showSubmitBtn()
    {
        $this->config['submitBtn'] = true;
        return $this;
    }

    /**
     * 隐藏表单重置按钮
     * @return $this
     */
    public function hideResetBtn()
    {
        $this->config['resetBtn'] = false;
        return $this;
    }

    /**
     * 显示表单重置按钮
     * @return $this
     */
    public function showResetBtn()
    {
        $this->config['resetBtn'] = true;
        return $this;
    }

    protected function parseFormComponent($rule)
    {
        if ($rule instanceof FormComponentInterface) {
            $rule = $rule->build();
        }
        return $rule;
    }

    public function getDependScript()
    {
        return $this->dependScript;
    }

    /**
     * 获取表单生成规则
     *
     * @return array
     */
    public function formRule()
    {
        $rules = [];
        foreach ($this->rule as $rule) {
            $rules[] = $this->parseFormComponent($rule);
        }
        return $rules;
    }

    /**
     * @return false|string
     */
    public function parseFormRule()
    {
        return json_encode($this->formRule());
    }

    /**
     * @return false|string
     */
    public function parseFormConfig()
    {
        return json_encode((object)$this->formConfig());
    }

    /**
     * @return string
     */
    public function parseDependScript()
    {
        return implode("\r\n", $this->dependScript);
    }

    /**
     * 获取表单配置
     *
     * @return array
     */
    public function formConfig()
    {
        $config = $this->config;
        if ($config instanceof ConfigInterface) return $config->build();
        foreach ($config as $k => $v) {
            $config[$k] = $this->parseFormComponent($v);
        }
        return $config;
    }


    /**
     * 获取表单创建的 js 代码
     *
     * @return false|string
     */
    public function formScript()
    {
        ob_start();
        $form = $this;
        $DS = DIRECTORY_SEPARATOR;
        require dirname(__FILE__) . $DS . 'Template' . $DS . 'createScript.min.php';
        $script = ob_get_clean();
        return $script;
    }

    /**
     * 获取表单视图
     *
     * @return string
     */
    public function view()
    {
        ob_start();
        $form = $this;
        $DS = DIRECTORY_SEPARATOR;
        require dirname(__FILE__) . $DS . 'Template' . $DS . 'form.php';
        $html = ob_get_clean();
        return $html;
    }

    /**
     * 检查field 是否重复
     *
     * @param null $rules
     * @param array $fields
     * @return array
     * @throws FormBuilderException
     */
    protected function checkFieldUnique($rules = null, $fields = [])
    {
        if (is_null($rules)) $rules = $this->rule;

        foreach ($rules as $rule) {
            $rule = $this->parseFormComponent($rule);
            $field = isset($rule['field']) ? $rule['field'] : null;

            if (isset($rule['children']) && count($rule['children']))
                $fields = $this->checkFieldUnique($rule['children'], $fields);

            if (is_null($field) || $field === '')
                continue;
            else if (isset($fields[$field]))
                throw new FormBuilderException('组件的 field 不能重复');
            else
                $fields[$field] = true;
        }

        return $fields;
    }

    /**
     * Iview 版表单生成器
     *
     * @param string $action
     * @param array $rule
     * @param array|ConfigInterface $config
     * @return Form
     * @throws FormBuilderException
     */
    public static function iview($action = '', $rule = [], $config = [])
    {
        return new self(new IViewBootstrap(), $action, $rule, $config);
    }

    /**
     * element-ui 版表单生成器
     *
     * @param string $action
     * @param array $rule
     * @param array|ConfigInterface $config
     * @return Form
     * @throws FormBuilderException
     */
    public static function elm($action = '', $rule = [], $config = [])
    {
        return new self(new ElmBootstrap(), $action, $rule, $config);
    }
}