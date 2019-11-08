<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%tag_to_news}}".
 *
 * @property int $tag_id
 * @property int $news_id
 *
 * @property News $news
 * @property Tag $tag
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

    /**
     * {@inheritdoc}
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
            'tag_id' => 'Tag ID',
            'news_id' => 'News ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }
}
