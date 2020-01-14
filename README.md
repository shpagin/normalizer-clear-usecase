# normalizer-clear-usecase
A code sample shows how to convert **object** <-> **array** bidirectional using [Symfony Serializer Component](https://symfony.com/doc/current/components/serializer.html) out of any framework context.

## Prerequisites
 - php
 - [composer](https://getcomposer.org/download/)

## Installation
```bash
git clone git@github.com:shpagin/normalizer-clear-usecase.git
cd normalizer-clear-usecase
composer install
```

## Usage
```bash
php run.php
```
Expected output:
```
Normalized: Full entity
array(3) {
  ["id"]=>
  int(104)
  ["title"]=>
  string(11) "Full entity"
  ["active"]=>
  bool(true)
}

Normalized: Partial entity
array(3) {
  ["id"]=>
  NULL
  ["title"]=>
  string(7) "Partial"
  ["active"]=>
  bool(false)
}

Normalized: Blank entity
array(3) {
  ["id"]=>
  NULL
  ["title"]=>
  NULL
  ["active"]=>
  bool(false)
}

Denormalized: Full data
object(Sample\Entity)#18 (3) {
  ["id":"Sample\Entity":private]=>
  int(101)
  ["title":"Sample\Entity":private]=>
  string(10) "Hello full"
  ["active":"Sample\Entity":private]=>
  bool(true)
}

Denormalized: Partial data
object(Sample\Entity)#17 (3) {
  ["id":"Sample\Entity":private]=>
  NULL
  ["title":"Sample\Entity":private]=>
  string(13) "Hello partial"
  ["active":"Sample\Entity":private]=>
  bool(false)
}

Denormalized: Attempt to inject foreign data
object(Sample\Entity)#12 (3) {
  ["id":"Sample\Entity":private]=>
  int(103)
  ["title":"Sample\Entity":private]=>
  string(11) "Bye foreign"
  ["active":"Sample\Entity":private]=>
  bool(false)
}
```
