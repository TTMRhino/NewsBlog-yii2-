<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string|null $announce
 * @property string|null $pic
 * @property string|null $news
 * @property string|null $date_public
 * @property int|null $active
 * @property int|null $author_id
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['news'], 'string'],
            [['date_public','author_id'], 'safe'],
            [['active'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['announce', 'pic'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'announce' => 'Announce',
            'pic' => 'Pic',
            'news' => 'News',
            'date_public' => 'Date Public',
            'active' => 'Active',
            'author_id' => 'User'
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }
    
}
