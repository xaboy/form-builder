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

namespace FormBuilder\ui\iview;

use FormBuilder\contract\BootstrapInterface;
use FormBuilder\Form;

class Bootstrap implements BootstrapInterface
{

    public function init(Form $form)
    {
        $dependScript = $form->getDependScript();

        array_splice($dependScript, 2, 0, [
            '<link href="https://unpkg.com/iview@3.4.2/dist/styles/iview.css" rel="stylesheet">',
            '<script src="https://unpkg.com/iview@3.4.2/dist/iview.min.js"></script>',
            '<script src="https://unpkg.com/@form-create/iview@1.0.3/dist/form-create.min.js"></script>',
        ]);

        $form->setDependScript($dependScript);
    }
}