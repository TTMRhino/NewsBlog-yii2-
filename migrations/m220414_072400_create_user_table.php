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
       
            $mainAdmin_user = new User();
           // $mainAdmin_user->created_at = 0;
           // $mainAdmin_user->updated_at = 0;
            $mainAdmin_user->username = 'Mainadmin';
            $mainAdmin_user->auth_key = 'h_3IwJ66ijbzbEcC8yKsvcaFeFZ0wkIk';
            $mainAdmin_user->email_confirm_token = '1';
            $mainAdmin_user->password_hash ='$2y$12$3HopN7bNGRZk/6oj3mbNP.ynkhes9QygfL9MirLP0aXnR9nvRL99S';
            $mainAdmin_user->password_reset_token = '';
            $mainAdmin_user->email = 'mainAdmin@mail.com';
            $mainAdmin_user->status = '1';

            $mainAdmin_user->save(false); 

            $admin_user = new User();
            //$admin_user->created_at = 0;
            //$admin_user->updated_at = 0;
            $admin_user->username = 'Admin';
            $admin_user->auth_key = 'h_3IwJ66ijbzbEcC8yKsvcaFeFZ0wkIk';
            $admin_user->email_confirm_token = '1';
            $admin_user->password_hash ='$2y$12$3HopN7bNGRZk/6oj3mbNP.ynkhes9QygfL9MirLP0aXnR9nvRL99S';
            $admin_user->password_reset_token = '';
            $admin_user->email = 'admin@mail.com';
            $admin_user->status = '1';
                   
            $admin_user->save(false);    
            
            $manager_user = new User();
           // $manager_user->created_at = 0;
           // $manager_user->updated_at = 0;
            $manager_user->username = 'Manager';
            $manager_user->auth_key = 'h_3IwJ66ijbzbEcC8yKsvcaFeFZ0wkIk';
            $manager_user->email_confirm_token = '1';
            $manager_user->password_hash ='$2y$12$3HopN7bNGRZk/6oj3mbNP.ynkhes9QygfL9MirLP0aXnR9nvRL99S';
            $manager_user->password_reset_token = '';
            $manager_user->email = 'manager@mail.com';
            $manager_user->status = '1';
                   
            $manager_user->save(false); 
            
            $moderator_user = new User();
           // $moderator_user->created_at = 0;
           // $moderator_user->updated_at = 0;
            $moderator_user->username = 'Moderator';
            $moderator_user->auth_key = 'h_3IwJ66ijbzbEcC8yKsvcaFeFZ0wkIk';
            $moderator_user->email_confirm_token = '1';
            $moderator_user->password_hash ='$2y$12$3HopN7bNGRZk/6oj3mbNP.ynkhes9QygfL9MirLP0aXnR9nvRL99S';
            $moderator_user->password_reset_token = '';
            $moderator_user->email = 'moderator@mail.com';
            $moderator_user->status = '1';
                   
            $moderator_user->save(false);    

        //die('Data generation is complete!');
    }


    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
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
