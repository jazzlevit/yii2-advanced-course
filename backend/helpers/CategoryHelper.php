<?php
/**
 * User: Aleksey Stetsenko
 * Date: 11/5/19
 * Time: 6:18 PM
 */

namespace backend\helpers;

use backend\models\Category;
use yii\helpers\ArrayHelper;

class CategoryHelper
{

    /**
     * @return array
     */
    public static function getAvailableCategories()
    {
        return ArrayHelper::map(Category::find()->all(), 'id', 'title');
    }
}
