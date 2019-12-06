<?php
/**
 * PHP表单生成器
 *
 * @package  FormBuilder
 * @author   xaboy <xaboy2005@qq.com>
 * @version  2.0
 * @license  MIT
 * @link     https://github.com/xaboy/form-builder
 * @document http://php.form-create.com
 */

namespace FormBuilder\Annotation;


use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\AnnotationReader as Render;
use FormBuilder\Contract\AnnotationInterface;
use FormBuilder\FormHandle;

class AnnotationReader
{
    protected static $isInit = false;

    protected $annotationReader;

    protected $handle;

    public function __construct(FormHandle $handle)
    {
        if (!self::$isInit) {
            AnnotationRegistry::registerLoader('class_exists');
            self::$isInit = true;
        }

        $this->annotationReader = new Render();
        $this->handle = $handle;
    }

    public function getRender()
    {
        return $this->annotationReader;
    }

    /**
     * @param $rules
     * @return array
     */
    public function parse($rules)
    {
        $formRule = [];
        $groupList = [];
        foreach ($rules as $rule) {
            $annotations = $this->annotationReader->getMethodAnnotations($rule['method']);
            $value = $rule['value'];
            $group = null;
            foreach ($annotations as $annotation) {
                if (!$annotation instanceof AnnotationInterface) continue;
                if ($annotation instanceof Group) {
                    $group = $annotation;
                } else {
                    $value = $rule['isArray'] ? $annotation->parseRule($value) : $annotation->parseComponent($value);
                }
            }

            if (!is_null($group)) {
                if (!isset($groupList[$group->id])) {
                    $groupList[$group->id] = $group;
                    $formRule[] = $group;
                }
                $groupList[$group->id]->appendChildren($value);
            } else {
                $formRule[] = $value;
            }
        }

        foreach ($formRule as $k => $v) {
            if ($v instanceof Group) {
                $formRule[$k] = $v->parse($this->handle->ui());
            }
        }

        return $formRule;
    }
}