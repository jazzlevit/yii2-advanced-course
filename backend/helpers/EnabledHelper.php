<?php

namespace backend\helpers;

use yii\helpers\ArrayHelper;

/**
 * Helper example
 */
class EnabledHelper
{

    const ENABLED_NO = 0;
    const ENABLED_YES = 1;

    /**
     * @return array
     */
    public static function getEnabledList()
    {
        return [static::ENABLED_NO, static::ENABLED_YES];
    }

    /**
     * @return array
     */
    public static function getEnabledFilter()
    {
        return [
            static::ENABLED_YES => 'Yes',
            static::ENABLED_NO => 'No',
        ];
    }

    /**
     * @param integer $enabled
     *
     * @return array
     */
    public static function getEnabledView($enabled)
    {
        return ArrayHelper::getValue(static::getEnabledFilter(), $enabled);
    }
}
