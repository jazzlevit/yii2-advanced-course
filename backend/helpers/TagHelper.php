<?php
/**
 * User: Aleksey Stetsenko
 * Date: 11/5/19
 * Time: 6:18 PM
 */

namespace backend\helpers;

use backend\models\Tag;
use yii\helpers\ArrayHelper;

class TagHelper
{

    /**
     * @return array
     */
    public static function getAvailableTags()
    {
        return ArrayHelper::map(Tag::find()->all(), 'title', 'title');
    }
}
