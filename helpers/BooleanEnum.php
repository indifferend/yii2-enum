<?php

namespace indifferend\enum\helpers;

/**
 * Class BooleanEnum
 *
 * @package indifferend\enum\helpers
 */
class BooleanEnum extends BaseEnum
{
    const YES = 1;
    const NO = 0;

    /**
     * @var array
     */
    public static $list = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];
}
