<?php

use yii\db\Migration;
use Faker\Factory;
use app\models\News;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220408_085201_create_news_table extends Migration
{


    private function generate()
    {
        $faker = Factory::create();
 
        for($i = 0; $i < 100; $i++)
         {
            $post = new News();
            $post->title = $faker->text(30);
            $post->announce = $faker->text(rand(100, 200));
            $post->news = $faker->text(rand(1000, 2000));
            $post->active = rand(0, 1);
            //$post->date_public = $faker->unixTime();
            $post->pic = 'logo.jpg';
            $post->save(false);
        }

       // die('Data generation is complete!');
    }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),            
            'announce' => $this->string(),
            'pic' => $this->string(),
            'news' => $this->text(),
            'date_public' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'active' => $this->boolean()->defaultValue(1)
        ]);

        $this->generate();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
