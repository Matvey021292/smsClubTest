<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tag".
 *
 * @property int $id
 * @property string $name
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['tag_id' => 'id']);
    }

}