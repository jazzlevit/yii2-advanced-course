<?php

namespace backend\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 *
 * @property TagToNews[] $tagToNews
 * @property News[] $news
 */
class Tag extends \common\models\Tag
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],

            [['slug', 'title'], 'string', 'max' => 256],

            [['slug'], 'unique'],

            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
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
//        return $this->hasMany(News::className(), ['id' => 'news_id'])->viaTable('{{%tag_to_news}}', ['tag_id' => 'id']);
        return $this->hasMany(News::class, ['id' => 'news_id'])->via('tagToNews');
    }
}
