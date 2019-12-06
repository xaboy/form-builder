<?php


namespace FormBuilder\Annotation\Validate;


/**
 * @Annotation
 */
final class Max extends ValidateAnnotation
{
    /**
     * @Required
     */
    public $value;


    public function parseRule($rule)
    {
        $rule = $this->tidyValidate($rule);
        $rule['validate'][] = ['max' => $this->value, 'type' => $this->type, 'trigger' => $this->trigger, 'message' => $this->message];
        return $rule;
    }

    public function parseComponent($component)
    {
        $component->appendValidate($component->createValidate()->max($this->value)->message($this->message));
        return $component;
    }
}