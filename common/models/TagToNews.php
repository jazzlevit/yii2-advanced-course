<?php

namespace common\models;

/**
 * This is the model class for table "{{%tag_to_news}}".
 *
 * @property int $tag_id
 * @property int $news_id
 */
class TagToNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag_to_news}}';
    }
}
