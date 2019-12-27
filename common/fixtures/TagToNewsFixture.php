<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class TagToNewsFixture extends ActiveFixture
{
    public $modelClass = 'common\models\TagToNews';

    public $dataDirectory = __DIR__ . '/_data';

    public $dataFile = 'tagToNews.php';
}
