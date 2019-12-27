<?php

namespace api\models;

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
class Category extends \common\models\Category implements Linkable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['enabled', 'default', 'value' => 0],

            [['title', 'slug', 'enabled'], 'required'],

            [['enabled'], 'boolean'],

            [['slug', 'title'], 'string', 'max' => 256],

            [['slug'], 'unique'],
        ];
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'slug',
            'title',
            'enabled'
        ];
    }

    /**
     * @return array
     */
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['category/view', 'id' => $this->id], true),
        ];
    }
}
