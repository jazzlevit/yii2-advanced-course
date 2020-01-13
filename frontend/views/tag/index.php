<?php
/**
 * @var string $title
 * @var $this \yii\web\View
 * @var \yii\db\ActiveQuery $model
 */

use yii\helpers\Html;

echo Html::tag('h2', Html::encode($title));

$id = 'list-of-tags00';

$this->params['model'] = $model;

// example of cache fragment
if ($this->beginCache($id, [
    'duration' => 360,
    'dependency' => [
        'class' => 'yii\caching\DbDependency',
        'sql' => 'SELECT COUNT(id) FROM tag',
    ]])) {

    if ($model->count() > 0) {
        /** @var \frontend\models\Tag $tag */
        foreach ($model->each() as $tag) {
            echo Html::a(
                $tag->title,
                ['tag/view', 'id' => $tag->id],
                ['class' => 'btn btn-default']
            ), ' ';
        }
    }

    // example of dynamic content using variables from current view
    echo Html::tag(
        'h2',
        $this->renderDynamic('return $this->params[\'model\']->one()[\'title\'];')
    );

    // example of dynamic content using Yii object
    echo Html::tag(
        'h3',
        $this->renderDynamic('return Yii::$app->security->generateRandomString();')
    );

    $this->endCache();

}
