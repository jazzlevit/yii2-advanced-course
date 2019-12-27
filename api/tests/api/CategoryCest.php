<?php

namespace api\tests;

use common\fixtures\CategoryFixture;

class CategoryCest
{
    public function _before(ApiTester $I)
    {
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
        ];
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function checkOptions(ApiTester $I)
    {
        // Collection
        $I->sendOPTIONS('/categories');
        $I->seeResponseCodeIs(200);

        $I->seeHttpHeader('allow', 'GET, POST, HEAD, OPTIONS');
        $I->seeHttpHeader('access-control-allow-methods', 'GET, POST, HEAD, OPTIONS');


        // Resource
        $I->sendOPTIONS('/categories/1');
        $I->seeResponseCodeIs(200);

        $I->seeHttpHeader('allow', 'GET, PUT, PATCH, DELETE, HEAD, OPTIONS');
        $I->seeHttpHeader('access-control-allow-methods', 'GET, PUT, PATCH, DELETE, HEAD, OPTIONS');
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function checkCollection(ApiTester $I)
    {
        $I->sendGET('/categories');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            'id' => 'integer',
            'slug' => 'string',
            'title' => 'string',
            'enabled' => 'integer',
        ]);

        $I->seeHttpHeader('X-Pagination-Total-Count', 2);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function checkResource(ApiTester $I)
    {
        $I->sendGET('/categories/1');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'id' => 1,
            'slug' => 'avtomobili',
            'title' => 'Автомобили',
            'enabled' => 1,
        ]);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function createResource(ApiTester $I)
    {
        $model = [
            'slug' => 'phones',
            'title' => 'Телефоны',
            'enabled' => 1,
        ];

        $I->sendPOST('/categories', $model);
        $I->seeResponseCodeIs(201);
        $I->seeResponseMatchesJsonType([
            'id' => 'integer'
        ]);

        // failed unique validation
        $I->sendPOST('/categories', $model);
        $I->seeResponseCodeIs(422);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function updateResource(ApiTester $I)
    {
        $data = [
            'title' => 'Растения',
            'enabled' => 0,
        ];
        $I->sendPUT('/categories/2', $data);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson($data);
    }

    /**
     * @param \api\tests\ApiTester $I
     */
    public function deleteResource(ApiTester $I)
    {
        $I->sendDELETE('/categories/2');
        $I->seeResponseCodeIs(204);

        $I->sendGET('/categories/2');
        $I->seeResponseCodeIs(404);
    }
}
