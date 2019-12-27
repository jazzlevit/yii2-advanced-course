<?php

namespace frontend\tests\functional;

use common\fixtures\CategoryFixture;
use common\fixtures\NewsFixture;
use frontend\tests\FunctionalTester;

class NewsCest
{

    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'category' => [
                'class' => CategoryFixture::class,
            ],
            'news' => [
                'class' => NewsFixture::class,
            ],
        ];
    }

    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }

    public function checkIndex(FunctionalTester $I)
    {
        $I->amOnPage('news/index');
        $I->see('You are on News/Index page', 'h2');
        $I->canSeeElement('#newsGrid');

        // check count of items
        $items = $I->grabMultiple('#newsGrid a.list-group-item');
        $I->assertCount(2, $items);
    }

    public function checkView(FunctionalTester $I)
    {
        $I->amOnPage('news/1');

        // check title
        $I->see('Volvo полностью переходит на выпуск электромобилей', 'h1');

        // check category link
        $I->seeLink('Автомобили');
        $I->see('Автомобили', '.label-success');

        // check count of tags
        $items = $I->grabMultiple('.label-default');
        $I->assertCount(2, $items);

        // check back link
        $I->seeLink('Go back', '/news');
    }
}
