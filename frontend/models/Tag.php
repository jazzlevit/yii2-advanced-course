<?php

namespace frontend\models;

use Yii;

/**
 * Class Tag
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 *
 * @property TagToNews[] $tagToNews
 * @property News[] $news
 *
 * @package frontend\models
 */
class Tag extends \common\models\Tag
{
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
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagToNews()
    {
        return $this->hasMany(TagToNews::class, ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])->via('tagToNews');
    }
}
