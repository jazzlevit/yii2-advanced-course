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
 * @property Category $category
 * @property TagToNews[] $tagToNews
 * @property Tag[] $tags
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

    /**
     * @return Category|null|\yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @return TagToNews[]|null|\yii\db\ActiveQuery
     */
    public function getTagToNews()
    {
        return $this->hasMany(TagToNews::class, ['news_id' => 'id']);
    }

    /**
     * @return Tag[]|null|\yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('tagToNews');
    }
}
