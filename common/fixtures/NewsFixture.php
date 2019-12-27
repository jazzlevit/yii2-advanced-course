<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class NewsFixture extends ActiveFixture
{
    public $modelClass = 'common\models\News';

    public $dataDirectory = __DIR__ . '/_data';

    public $dataFile = 'news.php';

    public $depends = [TagFixture::class, TagToNewsFixture::class];

}
