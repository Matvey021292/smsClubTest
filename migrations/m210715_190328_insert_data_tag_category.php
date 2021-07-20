<?php

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;
use yii\db\Migration;

/**
 * Class m210715_190328_insert_data_tag_category
 */
class m210715_190328_insert_data_tag_category extends Migration
{
    const URL_SITE_SOURCE = 'https://www.olx.ua/sitemap/';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $dom = new Dom;
        $dom->loadFromUrl(self::URL_SITE_SOURCE, (new Options())->setWhitespaceTextNode(false));
        $tags = $dom->find('.col');
        $i = 0;
        foreach ($tags as $tag) {
            $titles = $tag->find('h3');
            foreach ($titles as $title) {
                $i++;
                $this->insert('tag', [
                    'title' => $title->innerText,
                ]);
                $lists = $title->nextSibling();
                foreach ($lists as $list) {

                    $linksMap = [];
                    $links = $list->find('a');

                    foreach ($links as $link) {
                        $linksMap[] = [$link->title, $i];
                    }

                    $this->batchInsert('category', ['title', 'tag_id'], $linksMap);
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

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
