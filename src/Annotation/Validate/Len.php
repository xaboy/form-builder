<?php


namespace FormBuilder\Annotation\Validate;


/**
 * @Annotation
 */
final class Len extends ValidateAnnotation
{
    /**
     * @Required
     */
    public $value;


    public function parseRule($rule)
    {
        $rule = $this->tidyValidate($rule);
        $rule['validate'][] = ['len' => $this->value, 'type' => $this->type, 'trigger' => $this->trigger, 'message' => $this->message];
        return $rule;
    }

    public function parseComponent($component)
    {
        $component->appendValidate($component->createValidate()->len($this->value)->message($this->message));
        return $component;
    }
}