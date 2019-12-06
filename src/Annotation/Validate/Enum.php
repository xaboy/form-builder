<?php


namespace FormBuilder\Annotation\Validate;


/**
 * @Annotation
 */
final class Enum extends ValidateAnnotation
{
    /**
     * @Required
     * @var array
     */
    public $value = [];


    public function parseRule($rule)
    {
        $rule = $this->tidyValidate($rule);
        $rule['validate'][] = ['enum' => $this->value, 'type' => $this->type, 'trigger' => $this->trigger, 'message' => $this->message];
        return $rule;
    }

    public function parseComponent($component)
    {
        $component->appendValidate($component->createValidate()->enum($this->value)->message($this->message));
        return $component;
    }
}