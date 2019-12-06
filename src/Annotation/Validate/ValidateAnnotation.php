<?php


namespace FormBuilder\Annotation\Validate;


use FormBuilder\Contract\AnnotationInterface;

abstract class ValidateAnnotation implements AnnotationInterface
{

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $type = 'string';

    /**
     * @var string
     */
    public $trigger = 'change';


    public function tidyValidate($rule)
    {
        if (!isset($rule['validate']) || !is_array($rule['validate'])) {
            $rule['validate'] = [];
        }
        return $rule;
    }
}