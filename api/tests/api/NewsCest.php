<?php

namespace api\tests;

use common\fixtures\CategoryFixture;
use common\fixtures\NewsFixture;

class NewsCest
{
    public function _before(ApiTester $I)
    {
//        $I->haveFixtures();
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

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

    /**
     * @param \api\tests\ApiTester $I
     */
    public function checkOptions(ApiTester $I)
    {
        // Collection
        $I->sendOPTIONS('/news');
        $I->seeResponseCodeIs(200);

        $I->seeHttpHeader('allow', 'GET, HEAD, OPTIONS');
        $I->seeHttpHeader('access-control-allow-methods', 'GET, HEAD, OPTIONS');


        // Resource
        $I->sendOPTIONS('/news/1');
        $I->seeResponseCodeIs(200);

        $I->seeHttpHeader('allow', 'GET, HEAD, OPTIONS');
        $I->seeHttpHeader('access-control-allow-methods', 'GET, HEAD, OPTIONS');
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function checkCollection(ApiTester $I)
    {
        $I->sendGET('/news');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            'id' => 'integer',
            'slug' => 'string',
            'title' => 'string',
            'enabled' => 'string',
            '_links' => [
                'self' => ['href'=> 'string:url'],
                'category' => ['href'=> 'string:url'],
            ],
        ]);

        $I->seeHttpHeader('X-Pagination-Total-Count', 2);
        $I->seeHttpHeader('X-Pagination-Per-Page', 20);

//        $response = $I->grabResponse();
//        var_dump($response);die;
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function checkCollectionExpand(ApiTester $I)
    {
        $I->sendGET('/news?expand=description,category');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            'description' => 'string',
            'category' => 'array',
        ]);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function checkResource(ApiTester $I)
    {
        $I->sendGET('/news/1');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'id' => 1,
            'slug' => 'volvo-polnostu-perehodit-na-vypusk-elektromobilej',
            'title' => 'Volvo полностью переходит на выпуск электромобилей',
            'enabled' => 'Yes',
        ]);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function createResource(ApiTester $I)
    {
        $I->sendPOST('/news', [
            'slug' => 'volvo-polnostu-perehodit-na-vypusk-elektromobilej',
            'title' => 'Volvo полностью переходит на выпуск электромобилей',
            'enabled' => 'Yes',
        ]);
        $I->seeResponseCodeIs(405);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function updateResource(ApiTester $I)
    {
        $I->sendPUT('/news');
        $I->seeResponseCodeIs(405);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function deleteResource(ApiTester $I)
    {
        $I->sendPUT('/news/1');
        $I->seeResponseCodeIs(405);
    }
}
