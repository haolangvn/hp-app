<?php

/**
 * Description of ImagesUtils
 *
 * @author HAO
 */

namespace common\utils;

use Yii;
use yii\helpers\FileHelper;

class UImage {

    const ORG = '_org';
    const THUMB = '_thumb';

    public static function rootPath() {
        return Yii::getAlias('@uploadPath') . '/images/';
    }

    public static function getImageFile($fileName) {
        return !empty($fileName) ? self::rootPath() . $fileName : null;
    }

    public static function getImageUrl($fileName) {
        return \yii\helpers\Url::to('https://www.thegioinuochoa.com.vn/uploads/' . $fileName);
//        
        // Trả về đường dẫn images (tạo symlink trong ngixn)
        if (!file_exists(self::getImageFile($fileName))) {
            $fileName = 'no-image.png';
        }
        return \yii\helpers\Url::to('/uploads_mo/images/' . $fileName);
        return \yii\helpers\Url::to('/uploads/' . $fileName);

        // Kiểm tra nếu kg tồn tại image trả về ảnh mặc định.
        // nếu tồn tại đọc file và trả về dữ liệu
        $image = 'no-image.png';
        if (file_exists(static::getImageFile($fileName))) {
            $image = $fileName;
        }
        return Yii::$app->urlManagerFrontend->createUrl(['image/get', 'file' => $image]);
    }

    /**
     * Tạo thư mục chưa hình anh upload theo dạng <model>/Y/m/<attribute>
     * @param string $fileName
     * @param string $model
     * @param string $attribute
     * @return string
     */
    public static function createImageUri($fileName, $model = 'default', $attribute = 'default') {
        $uri = $model . UDate::getString(time(), '/Y/m/') . $attribute . '/';
        if (FileHelper::createDirectory(self::rootPath() . $uri)) {
            return $uri . $fileName;
        }
    }

    /**
     * Xóa hình ảnh
     * @param string $fileName (localtion)
     * @return boolean
     */
    public static function deleteImage($fileName) {
        $file = static::getImageFile($fileName);
        if (empty($file) || !file_exists($file)) {
            return false;
        }
        if (!unlink($file)) {
            return false;
        }
        return true;
    }

    public static function deleteListImages($listImages) {
        if (empty($listImages)) {
            return;
        }
        foreach ($listImages as $imageName) {
            static::deleteImage($imageName);
        }
    }

    public static function saveImagesAs($listImages, $listPath) {
        assert('count($listImages) == count($listPath)');
        $count = count($listImages);
        for ($i = 0; $i < $count; $i++) {
            $image = $listImages[$i];
            $path = $listPath[$i];
            $image->saveAs($path);
        }
    }

    /**
     * Get image name form image path
     * @param string $imagePath
     * @return string ImageName
     */
    public static function getImageName($imagePath) {
        $parts = explode('/', $imagePath);
        return $parts[count($parts) - 1];
    }

    /**
     * Get image uri form image path
     * @param string $imagePath
     * @return string ImagePath
     */
    public static function getImageUri($imagePath) {
        return str_replace(self::getImageName($imagePath), '', $imagePath);
    }

    public static function getImageExt($imagePath) {
        return strrchr($imagePath, '.');
    }

    /**
     * Copy image form url
     * @param string $in_url Remote url
     * @param string $out_local Local location
     * @return boolean
     */
    public static function copyImageFromUrl($in_url, $out_local) {
        try {
            if (!self::urlExits($in_url)) {
                return false;
            }
            $path = UFile::getFilePath($out_local);
            FileHelper::createDirectory($path);

            $in = fopen($in_url, "rb");
            $out = fopen($out_local, "wb");
            while ($chunk = fread($in, 8192)) {
                fwrite($out, $chunk, 8192);
            }
            fclose($in);
            fclose($out);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Copy image form local
     * @param string $in
     * @param string $out Local location
     * @return boolean
     */
    public static function copyImage($in, $out) {
        try {
            if (!file_exists($in)) {
                return false;
            }
            FileHelper::createDirectory(UFile::getFilePath($out));
            return copy($in, $out);
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Check Url exits
     * @param string $url
     * @return boolend
     */
    public static function urlExits($url) {
        $headers = get_headers($url);
        return stripos($headers[0], '200 OK') ? true : false;
    }

    public static function getThumb($imagePath, $model) {
        return str_replace($model, $model . self::THUMB, $imagePath);
    }

    public static function getOrg($imagePath, $model) {
        return str_replace($model, $model . self::ORG, $imagePath);
    }

}
