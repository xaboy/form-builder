<?php


namespace FormBuilder\Annotation;

use FormBuilder\Contract\AnnotationInterface;

/**
 * @Annotation
 * Class RuleAnnotation
 * @package FormBuilder
 */
final class Emit implements AnnotationInterface
{
    /**
     * @var array
     */
    public $emit = [];

    /**
     * @var string
     */
    public $prefix = '';


    public function parseRule($rule)
    {
        $rule['emit'] = $this->emit;
        if ($this->prefix)
            $rule['emitPrefix'] = $this->prefix;

        return $rule;
    }

    public function parseComponent($component)
    {
        $component->emit($this->emit)->emitPrefix($this->prefix);
        return $component;
    }
}