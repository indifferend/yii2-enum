<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Enum Extension for Yii2</h1>
    <br>
</p>

Enum implementation for Yii Framework 2.0

[![Latest Stable Version](https://poser.pugx.org/indifferend/yii2-enum/v/stable)](https://packagist.org/packages/indifferend/yii2-enum) [![Total Downloads](https://poser.pugx.org/indifferend/yii2-enum/downloads)](https://packagist.org/packages/indifferend/yii2-enum) [![License](https://poser.pugx.org/indifferend/yii2-enum/license)](https://packagist.org/packages/indifferend/yii2-enum)
[![Build Status](https://travis-ci.org/indifferend/yii2-enum.svg?branch=master)](https://travis-ci.org/indifferend/yii2-enum)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/indifferend/yii2-enum/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/indifferend/yii2-enum/?branch=master)

## Support us

Does your business depend on our contributions? Reach out and support us on [Patreon](https://www.patreon.com/indifferend). 
All pledges will be dedicated to allocating workforce on maintenance and new awesome stuff.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist indifferend/yii2-enum "*"
```

or add

```
"indifferend/yii2-enum": "*"
```

to the require section of your `composer.json` file.

## Available Methods:

- `createByName()` - Creates a new type instance using the name of a value.
- `getValueByName()` - Returns the constant key by value(label)
- `createByValue()` - Creates a new type instance using the value.
- `listData()` - Returns the associative array with constants values and labels
- `getLabel()`- Returns the constant label by key
- `getConstantsByName()` - Returns the list of constants (by name) for this type.
- `getConstantsByValue()` - Returns the list of constants (by value) for this type.
- `isValidName()` - Checks if a name is valid for this type.
- `isValidValue()` - Checks if a value is valid for this type.

## Declaration

```php
<?php

namespace app\models\enums;

use indifferend\enum\helpers\BaseEnum;

class PostStatus extends BaseEnum
{
    const PENDING = 0;
    const APPROVED = 1;
    const REJECTED = 2;
    const POSTPONED = 3;
    
    /**
     * @var string message category
     * You can set your own message category for translate the values in the $list property
     * Values in the $list property will be automatically translated in the function `listData()`
     */
    public static $messageCategory = 'app';
    
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
```
## Enum creation
```php
$status = new PostStatus(PostStatus::PENDING);

// or you can use the magic methods

$status = PostStatus::PENDING();
```

## Static methods
```php
PostStatus::getConstantsByValue() // ['PENDING', 'APPROVED', 'REJECTED', 'POSTPONED']
PostStatus::getConstantsByName() // ['PENDING' => 0, 'APPROVED' => 1, 'REJECTED' => 2, 'POSTPONED' => 3]
PostStatus::isValidName(1) // false
PostStatus::isValidName('APPROVED') // true
PostStatus::isValidValue(1) // true
PostStatus::isValidValue('Approved') // false
PostStatus::listData() // ['Pending', 'Approved', 'Rejected', 'Postponed']
PostStatus::getLabel(1) // Approved
PostStatus::getValueByName('Approved') // 1
```
## Type-Hint and Validation Rules
```php
<?php

use models\enums\PostStatus;
use yii\db\ActiveRecord;

class CommentModel extends ActiveRecord
{
    public function rules()
    {
        return [
            ['status', 'default', 'value' => PostStatus::APPROVED],
            ['status', 'in', 'range' => PostStatus::getConstantsByName()],
        ];
    }

    public function setStatus(PostStatus $status)
    {
        $this->status = $status->getValue();
    }

    public function getStatus()
    {
        return $this->status;
    }
}
```
