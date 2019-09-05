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

namespace FormBuilder\Contract;


interface ConfigInterface
{
    public function info($type);

    public function formStyle($formStyle);

    public function row($row);

    public function submitBtn($submitBtn);

    public function resetBtn($resetBtn);

    public function injectEvent($bool);

    public function getConfig();
}