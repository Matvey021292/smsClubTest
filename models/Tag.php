<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Tag".
 *
 * @property int $id
 * @property-read ActiveQuery $categories
 * @property string $name
 */
class Tag extends ActiveRecord
{
    public $tag;

    /**
     * @return ActiveQuery
     */
    public function getCategories(): ActiveQuery
    {
        return $this->hasMany(Category::class, ['tag_id' => 'id']);
    }

}