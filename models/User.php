<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $password_repeat;

    public function rules():array
    {
        return [
            ['password_hash', 'required'], 
            ['password_repeat', 'required'], 
            [['username','email'],'required'],
            [['username'],'unique','message'=>'UserName already exist. Please try another one.'],
            [['email'],'unique','message'=>'Email already exist. Please try another one.'],
            [['email'],'email'],           
            ['password_hash' ,'compare','compareAttribute'=>'password_hash','message'=>'password mismatch!'],
            [['auth_key','email'],'safe'],           
            [['password_hash'],'string','min'=>10,'max'=>80],
            ['access_token', 'safe'],
            [['username'],'string', 'max'=>20]
        ];
    }
    public static function tableName():string
    {
        return 'user';
    }
       

    /**
     * {@inheritdoc}
     * 
     * @param int $id  id user
     * 
     * @return object
     */
    public static function findIdentity($id):object
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
    public function getId(): int
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
