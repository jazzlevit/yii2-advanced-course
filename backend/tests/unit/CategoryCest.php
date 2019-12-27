<?php

namespace backend\tests\unit;

use backend\models\Category;
use backend\tests\UnitTester;
use common\fixtures\CategoryFixture;

class CategoryCest
{
    public function _before()
    {
    }

    // tests
    public function tryToTest()
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
     * @param UnitTester $I
     */
    public function tableName(UnitTester $I)
    {
        $I->assertEquals('{{%category}}', Category::tableName());
    }

    /**
     * @param UnitTester $I
     */
    public function checkDefaultState(UnitTester $I)
    {
        $model = new Category();
        $I->assertTrue($model->isNewRecord);

        $I->assertNull($model->id); // PK
        $I->assertNull($model->slug);
        $I->assertNull($model->title);
        $I->assertNull($model->enabled);
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return [

            // title
            [
                // required
                'attribute' => 'title', 'value' => null, 'isValid' => false,
            ],
            [
                // string
                'attribute' => 'title', 'value' => str_repeat('A', 1), 'isValid' => true,
            ],
            [
                // string max 256
                'attribute' => 'title', 'value' => str_repeat('A', 257), 'isValid' => false,
            ],

            // slug
            [
                // string
                'attribute' => 'slug', 'value' => str_repeat('A', 1), 'isValid' => true,
            ],
            [
                // string max 256
                'attribute' => 'slug', 'value' => str_repeat('A', 257), 'isValid' => false,
            ],

            // enabled
            [
                // required, default 0
                'attribute' => 'enabled', 'value' => null, 'isValid' => true,
            ],
            [
                // boolean
                'attribute' => 'enabled', 'value' => 0, 'isValid' => true,
            ],
            [
                // boolean
                'attribute' => 'enabled', 'value' => 1, 'isValid' => true,
            ],
        ];
    }

    /**
     * @param UnitTester $I
     * @param \Codeception\Example $data
     *
     * @param @dataProvider validationData
     */
    public function checkValidationRules(UnitTester $I, \Codeception\Example $data)
    {
        $model = new Category();
        $model->setAttribute($data['attribute'], $data['value']);

        $I->assertEquals($data['isValid'], $model->validate([$data['attribute']]));
    }

    /**
     * @param UnitTester $I
     */
    public function checkSlugIsUnique(UnitTester $I)
    {
        $model = new Category();

        // unique
        $model->setAttribute('slug', 'some-unique-slug-value');
        $I->assertTrue($model->validate('slug'));
        $I->assertEmpty($model->getErrors('slug'));

        // not unique (already exist in fixture)
        $model->setAttribute('slug', 'avtomobili');
        $I->assertFalse($model->validate('slug'));
        $I->assertNotEmpty($model->getErrors('slug'));
    }
}
