<?php

namespace frontend\tests\functional;

use common\fixtures\NewsFixture;
use frontend\tests\FunctionalTester;

class TagCest
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
        $I->amOnPage('tag/index');
        $I->see('You are on Tag/Index page', 'h2');
        $I->canSeeElement('.container');

        // check count of items
        $items = $I->grabMultiple('.container a.btn-default');
        $I->assertCount(4, $items);
    }

    public function checkView(FunctionalTester $I)
    {
        $I->amOnPage('tag/2');

        // check title
        $I->see('Tag name: "Авто"', 'h1');

        $I->see('List of news:');

        // check count of items
        $items = $I->grabMultiple('#newsGrid a.list-group-item');
        $I->assertCount(1, $items);

        // check back link
        $I->seeLink('Go back', '/tag');
    }
}
