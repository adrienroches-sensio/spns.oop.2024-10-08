<?php

function plop(): Generator
{
    for ($i = 1; $i <= 10; $i++) {
        echo 'before' . PHP_EOL;
        yield new DateTimeImmutable() => $i;
        echo 'after' . PHP_EOL;
        sleep(1);
    }

    return 'yes';
}

function plip(): array
{
    $result = [];
    for ($i = 1; $i <= 10; $i++) {
        $result[] = $i;
        echo $i . PHP_EOL;
    }

    return $result;
}

echo 'Start' . PHP_EOL;
$list = plop();
echo 'List' . PHP_EOL;
foreach ($list as $key => $item) {
    echo $item . PHP_EOL;
}
echo PHP_EOL . $list->getReturn() . PHP_EOL;


echo 'End' . PHP_EOL;



function printer() {
    echo "I'm printer!".PHP_EOL;
    while (true) {
        $string = yield;
        echo $string.PHP_EOL;
    }
}

$printer = printer();
$printer->send('Hello world!');

sleep(2);

$printer->send('Bye world!');
