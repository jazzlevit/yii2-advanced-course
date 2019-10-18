<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class Category
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property int $enabled
 *
 * @package frontend\models
 */
class Category extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }
}
