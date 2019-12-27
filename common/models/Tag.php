<?php

namespace common\models;

/**
 * Class Tag
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }
}
