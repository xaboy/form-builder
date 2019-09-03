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

namespace Xaboy\FormBuilder\driver;


use Xaboy\FormBuilder\contract\FormComponentInterface;
use Xaboy\FormBuilder\rule\BaseRule;
use Xaboy\FormBuilder\rule\ChildrenRule;
use Xaboy\FormBuilder\rule\EmitRule;
use Xaboy\FormBuilder\rule\PropsRule;
use Xaboy\FormBuilder\rule\ValidateRule;

/**
 * 自定义组件
 * Class CustomComponent
 */
class CustomComponent implements FormComponentInterface
{
    use BaseRule;
    use ChildrenRule;
    use EmitRule;
    use PropsRule;
    use ValidateRule;


    protected $defaultProps = [];

    /**
     * CustomComponent constructor.
     * @param null|string $type
     */
    public function __construct($type = null)
    {
        $this->setRuleType(is_null($type) ? $this->getComponentName() : $type)->props($this->defaultProps);
    }

    protected function getComponentName()
    {
        return lcfirst(basename(str_replace('\\', '/', get_class($this))));
    }

    public function build()
    {
        return array_merge(
            $this->parseBaseRule(),
            $this->parseEmitRule(),
            $this->parsePropsRule(),
            $this->parseValidateRule(),
            $this->parseChildrenRule()
        );
    }
}