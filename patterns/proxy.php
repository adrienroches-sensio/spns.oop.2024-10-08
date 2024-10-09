<?php

class Count
{
    public function calc()
    {
        return 'very heavy computation';
    }
}

class Proxy
{
    private string $cache;

    public function __construct(private Count $count)
    {
    }

    public function calc()
    {
        return $this->cache ??= $this->count->calc();
    }
}

$count = new Count();
$count2 = new Count();
$proxy = new Proxy($count);

// calc is really computed 1 time only
$proxy->calc();
$proxy->calc();
$proxy->calc();
$proxy->calc();
$proxy->calc();
