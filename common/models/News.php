<?php

namespace common\models;

/**
 * Class News
 *
 * @property int $id
 * @property int $category_id
 * @property string $slug
 * @property int $date
 * @property string $title
 * @property string $description
 * @property int $enabled
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%news}}';
    }
}
