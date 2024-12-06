<?php

namespace services;

use Exception;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Date;

class HabFilerException extends Exception
{
}

class HabFiler
{
    public static function getHealthyName($name)
    {
        return preg_replace('/[^\w\.]/', '-', $name);
    }

    public static function getUploadPath($name, $module)
    {
        // if (!is_dir(APP_ROOT . '/uploads')) {
        //     mkdir(APP_ROOT . '/uploads', 0777, true);
        // }
        // return '/uploads/' . $name;

        if (!is_dir(APP_ROOT . '/uploads/' . $module)) {
            mkdir(APP_ROOT . '/uploads/' . $module, 0777, true);
        }
        return '/uploads/' . $module . '/' . $name;
    }

    public static function uploadFile($file, $name, $module)
    {
        $time = Date('YmdHis');
        $uploadFileName = self::getHealthyName($time . "_" . $name . '_' . $file['name']);
        $uploadFilePath = self::getUploadPath($uploadFileName, $module);
        move_uploaded_file($file['tmp_name'], APP_ROOT . $uploadFilePath);
        return $uploadFilePath;
    }
}
