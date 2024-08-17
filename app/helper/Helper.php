<?php


namespace App\helper;

class Helper
{
    public static function uploadFile($fileObject, $directory, $existFileUrl = null)
    {
        if ($fileObject) {
            if ($existFileUrl) {
                if (file_exists(public_path($existFileUrl))) {
                    unlink(public_path($existFileUrl));
                }
            }
            $fileName = time() . rand(10, 1000) . $fileObject->getClientOriginalName();
            $fileDirectory = 'admin/assets/images/upload-images/' . $directory . '/';
            $fileObject->move(public_path($fileDirectory), $fileName);
            $fileUrl = $fileDirectory . $fileName;
        } else {
            $fileUrl = $existFileUrl ? $existFileUrl : null;
        }
        return $fileUrl;
    }

    public static function serialnumber()
    {
        return 'SER-' . rand(10000, 99999);
    }

    public static function ordernumber()
    {
        return 'ODS-' . rand(10000, 99999);
    }
}

