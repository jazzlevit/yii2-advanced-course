<?php

namespace api\models;

use Yii;
use yii\helpers\Url;
use yii\web\Linkable;

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
 */
class News extends \common\models\News implements Linkable
{
    /**
     * @return array
     */
    public function rules()
    {
        return [];
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
            'enabled' => function () {
                return Yii::$app->formatter->asBoolean($this->enabled);
            },
        ];
    }

    /**
     * @return array
     */
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
     * @return array
     */
    public function getLinks()
    {
        return [
            'self' => Url::to(['news/view', 'id' => $this->id], true),
            'category' => Url::to(['category/view', 'id' => $this->category_id], true),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getTags()
//    {
//        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('{{%tag_to_news}}', ['news_id' => 'id']);
//    }
}
