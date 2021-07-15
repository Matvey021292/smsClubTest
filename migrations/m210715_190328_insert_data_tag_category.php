<?php

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;
use yii\db\Migration;

/**
 * Class m210715_190328_insert_data_tag_category
 */
class m210715_190328_insert_data_tag_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $url = 'https://www.olx.ua/sitemap/';

        $dom = new Dom;
        $dom->loadFromUrl($url, (new Options())->setWhitespaceTextNode(false));
        $tags = $dom->find('.col');
        $i = 0;
        foreach ($tags as $tag) {
            $titles = $tag->find('h3');
            foreach ($titles as  $title) {
                $i++;
                $this->insert('tag',array(
                    'title'=> $title->innerText,
                ));
                $lists = $title->nextSibling();
                foreach ($lists as $list){
                    $links = $list->find('a');
                    foreach ($links as $link){
                        $this->insert('category',array(
                            'title'=> $link->innerText,
                            'tag_id' => $i,
                        ));
                    }
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210715_190328_insert_data_tag_category cannot be reverted.\n";

        return false;
    }
    */
}
