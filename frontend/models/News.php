<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

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
 *
 * @package frontend\models
 */
class News extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'slug' => Yii::t('app', 'Slug'),
            'date' => Yii::t('app', 'Date'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }
}
