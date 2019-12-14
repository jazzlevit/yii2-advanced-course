<?php

namespace api\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\validators\RequiredValidator;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property int $enabled
 *
 * @property Category $category
 * @property Tag[] $tags
 */
class News extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

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
            ['enabled', 'default', 'value' => 0],

            [['title', 'description', 'enabled'], RequiredValidator::class],

            ['category_id', 'integer'],

            ['enabled', 'boolean'],

            [['description'], 'string'],

            [['slug', 'title'], 'string', 'max' => 256],
            [['slug'], 'unique'],

            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function fields()
    {
        return [
            'id',
            'category_id',
            'slug',
            'title',
            'enabled' => function () {
                return Yii::$app->formatter->asBoolean($this->enabled);
            },
        ];
    }

    public function extraFields()
    {
        return [
            'description',
            'category',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @return Tag[]|null|\yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('{{%tag_to_news}}', ['news_id' => 'id']);
    }
}
