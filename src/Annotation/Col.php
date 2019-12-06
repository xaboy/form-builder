<?php


namespace FormBuilder\Annotation;

use FormBuilder\Contract\AnnotationInterface;

/**
 * @Annotation
 * Class RuleAnnotation
 * @package FormBuilder
 */
final class Col implements AnnotationInterface
{
    public $props = 24;

    protected function getCol()
    {
        if (is_integer($this->props))
            return ['span' => $this->props];
        else
            return $this->props;
    }

    public function parseRule($rule)
    {
        $rule['col'] = $this->getCol();

        return $rule;
    }

    public function parseComponent($component)
    {
        $component->col($this->getCol());

        return $component;
    }
}