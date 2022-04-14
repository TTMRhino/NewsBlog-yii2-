<?php

use yii\db\Migration;
use app\models\User;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220414_072400_create_user_table extends Migration
{

    private function generate()
    {
       
        
            $user = new User();
            $user->created_at = 0;
            $user->updated_at = 0;
            $user->username = 'Admin';
            $user->auth_key = 'h_3IwJ66ijbzbEcC8yKsvcaFeFZ0wkIk';
            $user->email_confirm_token = '1';
            $user->password_hash ='$2y$12$3HopN7bNGRZk/6oj3mbNP.ynkhes9QygfL9MirLP0aXnR9nvRL99S';
            $user->password_reset_token = '';
            $user->email = 'admin@mail.com';
            $user->status = '1';
                   
            $user->save(false);       

        //die('Data generation is complete!');
    }


    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'username' => $this->string()->notNull(),
            'auth_key' => $this->string(32),
            'email_confirm_token' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ]);

        $this->generate();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
