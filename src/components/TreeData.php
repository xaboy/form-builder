<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\components;


use FormBuilder\interfaces\FormComponentInterFace;
use FormBuilder\traits\component\CallPropsTrait;

/**
 * Class TreeData
 * @package FormBuilder\components
 */
class TreeData implements FormComponentInterFace
{
    use CallPropsTrait;

    /**
     * @var array
     */
    protected $children = [];

    /**
     * @var array
     */
    protected $props = [];

    /**
     * @var array
     */
    protected static $propsRule = [
        'id' => 'string',
        'title' => 'string',
        'expand' => 'boolean',
        'disabled' => 'boolean',
        'disableCheckbox' => 'boolean',
        'selected' => 'boolean',
        'checked' => 'boolean',
    ];

    /**
     * TreeData constructor.
     * @param $id
     * @param $title
     * @param array $children
     */
    public function __construct($id, $title, array $children = [])
    {
        $this->props['id'] = $id;
        $this->props['title'] = $title;
        $this->children = $children;
    }

    /**
     * @param array $children
     * @return $this
     */
    public function children(array $children)
    {
        $this->children = array_merge($this->children,$children);
        return $this;
    }

    /**
     * @param TreeData $child
     * @return $this
     */
    public function child(TreeData $child)
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * @return array
     */
    public function build()
    {
        $children = [];
        foreach ($this->children as $child){
            $children[] = $child instanceof TreeData
                ? $child->build()
                : $child;
        }
        $this->props['children'] = $children;
        return $this->props;
    }

}