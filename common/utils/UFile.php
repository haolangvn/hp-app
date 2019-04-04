<?php

namespace common\utils;

use Yii;
use yii\helpers\FileHelper;

/**
 * Description of UFile
 *
 * @author HAO
 */
class UFile {

    /**
     * Root Path trả về thư mục root nơi lưu trữ file
     * @return string
     */
    public static function rootPath() {
        return Yii::getAlias('@uploadPath') . '/files/';
    }

//    public static function getFilePath($file) {
//        $info = pathinfo($file);
//        return $info ? $info['dirname'] : '';
//    }

    /**
     * GetFile trả về đường dẫn tuyệt đối của file
     * @param string $file
     * @return string
     */
    public static function getFile($file) {
        return !empty($file) ? self::rootPath() . $file : null;
    }

//    public static function getFileUrl($file) {
//        if (!empty($file)) {
//            if (file_exists(static::getFile($file))) {
//                $image = $fileName;
//            }
//        }
//        return Yii::$app->urlManager->createUrl(['image/get', 'file' => $image]);
//    }

    /**
     * Chức năng tạo đường dẫn thư mục khi lưu file theo Model/Year/Month/
     * @param string $fileName
     * @param string $model
     * @return string
     */
    public static function createFileUri($fileName, $model = 'default') {
        $uri = $model . date('/Y/m/');
        if (FileHelper::createDirectory(self::rootPath() . $uri)) {
            return $uri . $fileName;
        }
    }

    /**
     * Hàm trả về ext của file
     * @param string $file
     * @return string
     */
    public static function getFileExtension($file) {
        return strtolower(substr($file, strrpos($file, '.') + 1));
    }

    /**
     * Hàm trả về Filename
     * @param string $file 
     * @return string
     */
    public static function getFileName($file) {
        $parts = explode('/', $file);
        return $parts[count($parts) - 1];
    }
    
    /**
     * Hàm xử lý chuổi.
     * Nhận vào là full file path và trả về file uri
     * @param string $filePath 
     * @return string
     */
    public static function getFilePath($filePath) {
        return str_replace(self::getFileName($filePath), '', $filePath);
    }

    /**
     * Hàm kiểm tra file từ Url và trả về kết quả file có tồn tại kg?
     * Nếu header trả về 200 OK nghĩa là file tồn tại
     * @param string $url
     * @return boolean
     */
    public static function fileExits($url) {
        $file_headers = @get_headers($url);
        return strpos($file_headers[0], '200 OK') !== false;
    }

    

}
