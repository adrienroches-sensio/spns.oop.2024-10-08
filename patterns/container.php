<?php

class Singleton
{
}

class Container
{
    private static array $services = [];

    public static function get(string $name, Closure $create): object
    {
        return self::$services[$name] ??= $create();
    }
}

$create = fn() => new Singleton();

$object1 = Container::get('singleton', $create);
$object2 = Container::get('singleton', $create);
$object3 = Container::get('singleton', $create);
$object4 = Container::get('singleton', $create);
$object5 = Container::get('singleton', $create);
$object6 = Container::get('singleton', $create);

var_dump(
    $object1 === $object6,
    spl_object_id($object1),
    spl_object_id($object2),
    spl_object_id($object3),
    spl_object_id($object4),
    spl_object_id($object5),
    spl_object_id($object6),
);
