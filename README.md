PHPC2 - 2024.10
===============

Install
-------

Clone this repository
For example using SSH :

```shell
$ git clone git@github.com:adrienroches-sensio/spns.oop.2024-10-08.git
```

Then go inside the created directory and run :

```shell
$ composer install
```

Running tests
-------------

```shell
$ ./vendor/bin/phpunit --coverage-html ./coverage --testdox
```

For mutation testing :

```shell
$ ./vendor/bin/infection
$ # or
$ ./vendor/bin/infection --only-covered
```

Trying the app
--------------

```shell
$ php ./run.php
```

Trying patterns
---------------

```shell
$ # Singleton pattern
$ php ./pattern/singleton.php
$ # Container pattern
$ php ./pattern/container.php
$ # Proxy pattern
$ php ./pattern/proxy.php
$ # Play with iterators
$ php ./pattern/iterator.php
```

Play with Generics
------------------

See https://phpstan.org/r/b6e0257b-3e5d-441c-a2e0-a56121b745fc
