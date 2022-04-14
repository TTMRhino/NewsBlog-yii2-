<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\News;
use yii\imagine\Image;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg'],
        ];
    }
    
    public function upload(News $model)
    {
        if ($this->validate()) {         
       
            if(isset($this->imageFile->extension)){
                $filename = strtolower(md5(uniqid($this->imageFile->basename)). '.'. $this->imageFile->extension);

                $model->pic = $filename;//update news.field in DB
                $model->save();
    
                //dd($filename,true);
                $this->imageFile->saveAs(\Yii::getAlias('@webroot/pic/'. $filename));
                Image::resize(\Yii::getAlias('@webroot/pic/'. $filename), 200, 200)->save(\Yii::getAlias('@webroot/pic/'.$filename), ['quality' => 100]);;
              
                return true;
            }
            return true;
           
        } else {
            return false;
        }
    }

    public function deleteCurrentImage($currentImage)
    {
        if (file_exists("pic/". $currentImage))
        {
            @unlink("pic/". $currentImage);//удаляем уже имеющуюся картинку
        }
       
    }
}