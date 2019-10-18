<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class Tag
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 *
 * @package frontend\models
 */
class Tag extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%tag}}';
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
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
        ];
    }
}
