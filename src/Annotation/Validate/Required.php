<?php


namespace FormBuilder\Annotation\Validate;

use FormBuilder\Contract\AnnotationInterface;

/**
 * @Annotation
 * Class RuleAnnotation
 * @package FormBuilder
 */
final class Required extends ValidateAnnotation
{

    public function parseRule($rule)
    {
        $rule = $this->tidyValidate($rule);
        $rule['required'] = true;
        $rule['validate'][] = ['required' => true, 'type' => $this->type, 'trigger' => $this->trigger, 'message' => $this->message];
        return $rule;
    }

    public function parseComponent($component)
    {
        $component->required($this->message);
        return $component;
    }
}