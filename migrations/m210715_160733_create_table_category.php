<?php

use yii\db\Migration;

/**
 * Class m210715_160733_create_table_category
 */
class m210715_160733_create_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'tag_id' => $this->integer()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx-category-tag_id',
            'category',
            'tag_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-category-tag_id',
            'category',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-category-tag_id',
            'category'
        );
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210715_160733_create_table_category cannot be reverted.\n";

        return false;
    }
    */
}
