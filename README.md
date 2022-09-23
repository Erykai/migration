# Migration
[![Maintainer](http://img.shields.io/badge/maintainer-@alexdeovidal-blue.svg?style=flat-square)](https://instagram.com/alexdeovidal)
[![Source Code](http://img.shields.io/badge/source-erykai/migration-blue.svg?style=flat-square)](https://github.com/erykai/migration)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/erykai/migration.svg?style=flat-square)](https://packagist.org/packages/erykai/migration)
[![Latest Version](https://img.shields.io/github/release/erykai/migration.svg?style=flat-square)](https://github.com/erykai/migration/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Quality Score](https://img.shields.io/scrutinizer/g/erykai/migration.svg?style=flat-square)](https://scrutinizer-ci.com/g/erykai/migration)
[![Total Downloads](https://img.shields.io/packagist/dt/erykai/migration.svg?style=flat-square)](https://packagist.org/packages/erykai/migration)

Auto create tables mysql

## Installation

Composer:

```bash
"erykai/migration": "1.0.*"
```

Terminal

```bash
composer require erykai/migration
```

Create users.php

```php
use Erikai\Migration;
require "vendor/autoload.php";
$create = new Migration();
$create->table('users');
$create->column('id')->type('int(11)')->default();
$create->column('name')->type('varchar(255)')->default();
$create->column('password')->type('text')->default()->null();
$create->column('email')->type('varchar(255)')->default();
$create->column('level')->type('int(11)')->default();
$create->column('profile')->type('varchar(255)')->default()->null();
$create->column('cover')->type('varchar(255)')->default()->null();
$create->column('created_at')->type('timestamp')->default("current_timestamp()");
$create->column('updated_at')->type('timestamp')->default("current_timestamp() ON UPDATE current_timestamp()");
$create->save();
$create->primary('id');
$create->autoIncrement('id');
```

Create posts_categories.php

```php
use Erikai\Migration;
require "vendor/autoload.php";
$create = new Migration();
$create->table('posts_categories');
$create->column('id')->type('int(11)')->default();
$create->column('id_user')->type('int(11)')->default();
$create->column('title')->type('varchar(255)')->default();
$create->column('created_at')->type('timestamp')->default("current_timestamp()");
$create->column('updated_at')->type('timestamp')->default("current_timestamp() ON UPDATE current_timestamp()");
$create->save();
$create->primary('id');
$create->autoIncrement('id');
$create->addKey('users_categories', "id_user", "users", "id");
```

Create posts.php

```php
use Erikai\Migration;
require "vendor/autoload.php";
$create = new Migration();
$create->table('posts');
$create->column('id')->type('int(11)')->default();
$create->column('id_user')->type('int(11)')->default();
$create->column('id_category')->type('int(11)')->default();
$create->column('title')->type('varchar(255)')->default();
$create->column('description')->type('text')->default();
$create->column('cover')->type('varchar(255)')->default()->null();
$create->column('created_at')->type('timestamp')->default("current_timestamp()");
$create->column('updated_at')->type('timestamp')->default("current_timestamp() ON UPDATE current_timestamp()");
$create->save();
$create->primary('id');
$create->autoIncrement('id');
$create->addKey('users_posts', "id_user", "users", "id");
$create->addKey('posts_categories', "id_category", "posts_categories", "id");
```

## Contribution

All contributions will be analyzed, if you make more than one change, make the commit one by one.

## Support


If you find faults send an email reporting to webav.com.br@gmail.com.

## Credits

- [Alex de O. Vidal](https://github.com/alexdeovidal) (Developer)
- [All contributions](https://github.com/erykai/migration/contributors) (Contributors)

## License

The MIT License (MIT). Please see [License](https://github.com/erykai/migration/LICENSE) for more information.

