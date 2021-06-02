<?php

namespace indifferend\enum\tests\data;

use indifferend\enum\helpers\BaseEnum;

/**
 * Class PostStatus
 *
 * @package indifferend\enum\tests\data
 */
class PostStatus extends BaseEnum
{
    const PENDING = 0;
    const APPROVED = 1;
    const REJECTED = 2;
    const POSTPONED = 3;

    /**
     * @var array
     */
    public static $list = [
        self::PENDING => 'Pending',
        self::APPROVED => 'Approved',
        self::REJECTED => 'Rejected',
        self::POSTPONED => 'Postponed',
    ];
}
