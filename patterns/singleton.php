<?php

class Singleton
{
    private static self $_instance;

    private function __construct()
    {
    }

    public static function get(): self
    {
        return self::$_instance ??= new self();
    }
}

$object1 = Singleton::get();
$object2 = Singleton::get();
$object3 = Singleton::get();
$object4 = Singleton::get();
$object5 = Singleton::get();
$object6 = Singleton::get();

var_dump(
    $object1 === $object6,
    spl_object_id($object1),
    spl_object_id($object2),
    spl_object_id($object3),
    spl_object_id($object4),
    spl_object_id($object5),
    spl_object_id($object6),
);
