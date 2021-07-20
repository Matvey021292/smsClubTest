<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Category".
 *
 * @property int $id
 * @property-read ActiveQuery $tag
 * @property string $name
 */
class Category extends ActiveRecord
{
    /**
     * @return ActiveQuery
     */
    public function getTag(): ActiveQuery
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }

}