<?php

namespace common\models;

/**
 * Class Category
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property int $enabled
 */
class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }
}
