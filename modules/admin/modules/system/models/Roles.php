<?php

namespace app\modules\admin\modules\system\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property AuthItem $itemName
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName():string
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules():array
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels():array
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ItemName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemName():ActiveQuery
    {
        return $this->hasOne(AuthItem::class, ['name' => 'item_name']);
    }
    
    /**
     * Gets user  -> user(table).
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser():ActiveQuery
    {
        return $this->hasMany(User::class,['user_id'=>'id']);
      }
}
