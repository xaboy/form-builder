<?php


namespace FormBuilder\Annotation\Validate;


/**
 * @Annotation
 */
final class Range extends ValidateAnnotation
{
    /**
     * @Required
     * @var array
     */
    public $value = [];


    public function parseRule($rule)
    {
        $rule = $this->tidyValidate($rule);
        $rule['validate'][] = ['range' => $this->value, 'type' => $this->type, 'trigger' => $this->trigger, 'message' => $this->message];
        return $rule;
    }

    public function parseComponent($component)
    {
        $component->appendValidate($component->createValidate()->range($this->value[0], $this->value[1])->message($this->message));
        return $component;
    }
}