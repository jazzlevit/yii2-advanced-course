<?php

namespace api\models;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 *
 * @property News[] $news
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @return News[]|null|\yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])->viaTable('{{%tag_to_news}}', ['tag_id' => 'id']);
    }
}
