<?php

use yii\db\Migration;
use Faker\Factory;
use app\models\News;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220414_072401_create_news_table extends Migration
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
            $post->author_id = 3;
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
            'active' => $this->boolean()->defaultValue(1),
            'author_id' => $this->integer()->notNull()
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-post-author_id',
            'news',
            'author_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-author_id',
            'news',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );

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
