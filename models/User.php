<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $password_repeat;

    public function rules()
    {
        return [           
            ['password_hash' ,'compare','message'=>'password mismatch!'],
            [['auth_key','email'],'safe'],           
            [['password_hash'],'string','max'=>80],
            ['access_token', 'safe'],
        ];
    }
    public static function tableName()
    {
        return 'user';
    }
       

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        

        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     * $options = [
     *          'cost' => 12,
     *       ];
     * $hash=password_hash($modelNew->password, PASSWORD_BCRYPT,$options);
     */
    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->getSecurity()->generateRandomString();
    }
}
