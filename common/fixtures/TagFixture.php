<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class TagFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Tag';

    public $dataDirectory = __DIR__ . '/_data';

    public $dataFile = 'tag.php';

}
