<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Url;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?php echo Yii::t('frontend', 'Online news'); ?></h1>

        <p class="lead"><?php echo Yii::t('frontend', 'Subscribe to get the latest news'); ?></p>

        <p>
            <a class="btn btn-lg btn-success" href="<?php echo Url::to(['news/index']); ?>">
                <?php echo Yii::t('frontend', 'Start the journey'); ?>
            </a>
        </p>
    </div>

</div>