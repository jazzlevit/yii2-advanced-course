<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('Online news');
        $I->see('Subscribe to get the latest news');
        $I->seeLink('Start the journey');
        $I->click('Start the journey');
        $I->see('You are on News/Index page');

        $I->seeLink('Home');
        $I->seeLink('News');
        $I->seeLink('Categories');
        $I->seeLink('Tags');
        $I->seeLink('Signup');
        $I->seeLink('Login');
    }
}