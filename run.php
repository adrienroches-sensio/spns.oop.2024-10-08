<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Admin;
use App\BadCredentialsException;
use App\Counter;
use App\Regular;
use App\MemberLevel;
use App\TraceableMember;
use App\User;

$member1 = new Regular(new User('member1'), 'member1', 'member1', 10);
$member2 = new Regular(new User('member2'), 'member2', 'member2', 10);
$member3 = new Regular(new User('member3'), 'member3', 'member3', 10);
$member4 = new Regular(new User('member4'), 'member4', 'member4', 10);
$member5 = new TraceableMember(new Regular(new User('member5'), 'member5', 'member5', 10));

$admin1 = new Admin(new Regular(new User('admin1'), 'admin1', 'admin1', 10), MemberLevel::Admin);
$admin2 = new Admin(new Regular(new User('admin2'), 'admin2', 'admin2', 10), MemberLevel::SuperAdmin);

echo '--------------------------------' . PHP_EOL;
echo "Regular count : " . Counter::get(Regular::class) . PHP_EOL;
echo "Admin count : " . Counter::get(Admin::class) . PHP_EOL;

unset($member1);

echo '    >>> After unset $member1 <<<' . PHP_EOL;
echo "Regular count : " . Counter::get(Regular::class) . PHP_EOL;
echo "Admin count : " . Counter::get(Admin::class) . PHP_EOL;
echo '--------------------------------' . PHP_EOL;

echo PHP_EOL;

echo '--------------------------------' . PHP_EOL;
echo 'Trying out __toString()' . PHP_EOL;

echo "Regular 2 : {$member2}" . PHP_EOL;
echo "Admin 1 : {$admin1}" . PHP_EOL;
echo "Admin 2 : {$admin2}" . PHP_EOL;
echo '--------------------------------' . PHP_EOL;

echo PHP_EOL;

echo '--------------------------------' . PHP_EOL;
echo 'Bad credentials' . PHP_EOL;

try {
    $member2->auth('fake', 'fake');
} catch (BadCredentialsException $e) {
    echo $e->getMessage() . PHP_EOL;
}
echo '--------------------------------' . PHP_EOL;
