<?php


namespace FormBuilder\Annotation;

use FormBuilder\Contract\AnnotationInterface;

/**
 * @Annotation
 * Class RuleAnnotation
 * @package FormBuilder
 */
final class ClassName implements AnnotationInterface
{

    /**
     * @var string
     */
    public $className = '';

    public function parseRule($rule)
    {
        $rule['className'] = $this->className;
        return $rule;
    }

    public function parseComponent($component)
    {
        $component->className($this->className);
        return $component;
    }
}