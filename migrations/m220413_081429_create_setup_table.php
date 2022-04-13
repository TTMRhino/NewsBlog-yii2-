<?php

use yii\db\Migration;
use app\modules\admin\models\Setup;

/**
 * Handles the creation of table `{{%setup}}`.
 */
class m220413_081429_create_setup_table extends Migration
{

    private function generate()
    {
       
        
            $post = new Setup();
            $post->pageSize = 10;           
            $post->save(false);       

        //die('Data generation is complete!');
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setup}}', [
            'id' => $this->primaryKey(),
            'pageSize' => $this->integer()->defaultValue(10),    
        ]);

        $this->generate();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setup}}');
    }
}
