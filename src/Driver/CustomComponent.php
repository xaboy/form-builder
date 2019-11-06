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

namespace FormBuilder\Driver;


use FormBuilder\Contract\CustomComponentInterface;
use FormBuilder\Rule\BaseRule;
use FormBuilder\Rule\CallPropsRule;
use FormBuilder\Rule\ChildrenRule;
use FormBuilder\Rule\EmitRule;
use FormBuilder\Rule\PropsRule;
use FormBuilder\Rule\ValidateRule;

/**
 * 自定义组件
 * Class CustomComponent
 */
class CustomComponent implements CustomComponentInterface
{
    use BaseRule;
    use ChildrenRule;
    use EmitRule;
    use PropsRule;
    use ValidateRule;
    use CallPropsRule;

    protected static $propsRule = [];

    protected $defaultProps = [];

    /**
     * CustomComponent constructor.
     * @param null|string $type
     */
    public function __construct($type = null)
    {
        $this->setRuleType(is_null($type) ? $this->getComponentName() : $type)->props($this->defaultProps);
    }

    public function __toString()
    {
        return $this->toJson();
    }

    public function __invoke()
    {
        return $this->build();
    }

    public function toJson()
    {
        return json_encode($this->build());
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