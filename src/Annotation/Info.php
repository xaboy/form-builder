<?php


namespace FormBuilder\Annotation;

use FormBuilder\Contract\AnnotationInterface;

/**
 * @Annotation
 * Class RuleAnnotation
 * @package FormBuilder
 */
final class Info implements AnnotationInterface
{
    /**
     * @var string
     */
    public $info = '';

    public function parseRule($rule)
    {
        $rule['info'] = $this->info;

        return $rule;
    }

    public function parseComponent($component)
    {
        $component->info($this->info);

        return $component;
    }
}