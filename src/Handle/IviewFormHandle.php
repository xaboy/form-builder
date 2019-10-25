<?php
/**
 * PHP表单生成器
 *
 * @package  FormBuilder
 * @author   xaboy <xaboy2005@qq.com>
 * @version  2.0
 * @license  MIT
 * @link     https://github.com/xaboy/form-builder
 */

namespace FormBuilder\Handle;


use FormBuilder\FormHandle;

/**
 * Iview 表单生成类
 *
 * Class IviewFormHandle
 * @package FormBuilder\Factory
 */
class IviewFormHandle extends FormHandle
{

    protected function ui()
    {
        return 'iview';
    }
}