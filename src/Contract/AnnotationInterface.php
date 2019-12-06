<?php


namespace FormBuilder\Contract;


interface AnnotationInterface
{
    /**
     * @param array $rule
     * @return array
     */
    public function parseRule($rule);

    /**
     * @param CustomComponentInterface $component
     * @return CustomComponentInterface
     */
    public function parseComponent($component);
}