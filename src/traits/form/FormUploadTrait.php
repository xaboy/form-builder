<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Upload;

trait FormUploadTrait
{
    public static function upload($field, $title, $action, $value = '', $type = Upload::TYPE_FILE)
    {
        $upload = new Upload($field, $title, $value);
        $upload->uploadType($type);
        $upload->action($action);
        return $upload;
    }

    public static function uploadImages($field, $title, $action, array $value = [])
    {
        $upload = self::upload($field, $title, $action, $value, Upload::TYPE_IMAGE);
        $upload->format(['jpg','jpeg','png','gif'])->accept('image/*');
        return $upload;

    }

    public static function uploadFiles($field, $title, $action, array $value = [])
    {
        return self::upload($field, $title, $action, $value, Upload::TYPE_FILE);
    }

    public static function uploadImageOne($field, $title, $action, $value = '')
    {
        $upload = self::upload($field, $title, $action, $value, Upload::TYPE_IMAGE);
        $upload->format(['jpg','jpeg','png','gif'])->accept('image/*')->maxLength(1);
        return $upload;
    }

    public static function uploadFileOne($field, $title, $action, $value = '')
    {
        $upload = self::upload($field, $title, $action, (string)$value, Upload::TYPE_FILE);
        $upload->maxLength(1);
        return $upload;
    }
}