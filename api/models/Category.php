<?php

namespace api\models;

use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * Class Category
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property int $enabled
 *
 *
 * @package api\models
 */
class Category extends ActiveRecord implements Linkable
{

    public static function tableName()
    {
        return '{{%category}}';
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

            [['title', 'enabled'], 'required'],

            [['enabled'], 'boolean'],

            [['slug', 'title'], 'string', 'max' => 256],

            [['slug'], 'unique'],
        ];
    }

    public function fields()
    {
        return [
            'pk' => 'id',
            'slug',
            'title',
        ];
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['category/view', 'id' => $this->id], true),
//            'self' => 'http://example.com/users/1',
//            'friends' => [
//                'http://example.com/users/2',
//                'http://example.com/users/3',
//            ],
        ];
    }
}
