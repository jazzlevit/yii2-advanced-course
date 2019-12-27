<?php

namespace frontend\models;

use Yii;

/**
 * Class Category
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property int $enabled
 *
 * @property News[] $news
 *
 * @package frontend\models
 */
class Category extends \common\models\Category
{
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

    /**
     * @return News|null|\yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['category_id' => 'id']);
    }
}
