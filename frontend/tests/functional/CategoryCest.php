<?php

namespace frontend\tests\functional;

use common\fixtures\CategoryFixture;
use common\fixtures\NewsFixture;
use frontend\tests\FunctionalTester;

class CategoryCest
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
//        var_dump($I->grabPageSource());die();
        $I->amOnPage('category/index');

        $I->seeRecord('frontend\models\Category', ['id' => 1]);

        $I->see('You are on Category/Index page', 'h2');

        // check links
        $I->see('Автомобили');
        $I->see('Спорт');

        // check count of items
        $items = $I->grabMultiple('#categoryGrid a.list-group-item');
        $I->assertCount(2, $items);
    }

    public function checkView(FunctionalTester $I)
    {
        $I->amOnPage('category/1');

        // check tags, text
        $I->see('List of news:');
        $I->see('Category name: "Автомобили"', 'h1');

        // check count of items
        $items = $I->grabMultiple('#newsGrid a.list-group-item');
        $I->assertCount(1, $items);

        // check back link
        $I->seeLink('Go back', '/category');
    }
}
