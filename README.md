php-self-organizing-list
========================

A package of Self-Organizing lists.

## Install
Use Composer:
```json
"nulpunkt/salist": "dev-master"
```

## Usage
```php
require_once("vendor/autoload.php");

$l = new Nulpunkt\SAList\CountList();
$l->add(1);
$l->add(2);
$l->add(3);
echo $l->find(function ($e) { return $e == 2; }); // 2
```

Currently there is 3 list types: MoveToFrontList, CountList, TransposeList. You can consult [Wikepedia](http://en.wikipedia.org/wiki/Self-organizing_list) for more info.
