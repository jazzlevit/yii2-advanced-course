<?php
//        Yii::$app->language = 'en';
    echo "PHP: " . PHP_VERSION . "\n";
    echo "ICU: " . INTL_ICU_VERSION . "\n";

//Yii::$app->language = 'en';
?>
<h3>Перевод сообщений</h3>

<?php echo \Yii::t('frontend', 'Default value for source language is English'); ?>

<h3>Именованные указатели</h3>
<?php
    $username = 'Алексей';

    echo \Yii::t('frontend', 'Hello, {username}!', [
    'username' => $username,
    ]);
?>

<h3>Позиционные указатели / Number</h3>
<?php
    $sum = 42;

    echo \Yii::t('frontend', 'Balance: {0}', $sum);

    echo '<br>';

    echo \Yii::t('frontend', 'Balance: {0, number, currency}', $sum);
?>

<h3>Числа прописью / Spellout</h3>
<?php echo \Yii::t('frontend', '{n,number} is spelled as {n,spellout}', ['n' => 42]); ?>

<h3>Множественное число / Plural</h3>
<?php
$likeCount = 30;

echo Yii::t('frontend', 'You {n,plural,
    offset:1
    =0{did not like this}
    =1{liked this}
    one{and one other person liked this}
    other{and # others liked this}
}', [
    'n' => $likeCount
]);
?>

<h3>Форматирование</h3>
<?php

echo Yii::$app->formatter->asDate('2014-01-01', 'long');
echo '<br>';

echo Yii::$app->formatter->asPercent(0.125, 2);
echo '<br>';

echo Yii::$app->formatter->asEmail('cebe@example.com');
echo '<br>';

echo Yii::$app->formatter->asBoolean(true);
echo '<br>';

echo Yii::$app->formatter->asDate(null);
echo '<br>';

echo Yii::$app->formatter->asDecimal(2222.30);
echo '<br>';

echo Yii::$app->formatter->asCurrency(2222.30);
echo '<br>';

echo Yii::$app->formatter->asDuration(7000);
echo '<br>';

echo Yii::$app->formatter->format('Hello world', 'raw');
echo '<br>';

echo Yii::$app->formatter->format(null, 'raw');
echo '<br>';

echo Yii::t('frontend', 'New message after switched to db message source.');
echo '<br>';
