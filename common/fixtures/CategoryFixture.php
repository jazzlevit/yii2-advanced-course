<?php

namespace common\fixtures;

use yii\test\ActiveFixture;

class CategoryFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Category';

    public $dataDirectory = __DIR__ . '/_data';

    public $dataFile = 'category.php';

}
