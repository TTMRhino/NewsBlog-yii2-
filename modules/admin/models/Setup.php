<?php
namespace app\modules\admin\models;


class Setup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setup';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pageSize'], 'safe'],           
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pageSize' => 'PageSize',            
        ];
    }

}