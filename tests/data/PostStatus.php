<?php

namespace indifferentmoviegoer\enum\tests\data;

use indifferentmoviegoer\enum\helpers\BaseEnum;

/**
 * Class PostStatus
 *
 * @package indifferentmoviegoer\enum\tests\data
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
