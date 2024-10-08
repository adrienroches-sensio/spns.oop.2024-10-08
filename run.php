<?php

require_once __DIR__ . '/src/CanAuthenticate.php';
require_once __DIR__ . '/src/MemberLevel.php';
require_once __DIR__ . '/src/Member.php';
require_once __DIR__ . '/src/Admin.php';

$member1 = new Member('member1', 'member1', 10);
$member2 = new Member('member2', 'member2', 10);
$member3 = new Member('member3', 'member3', 10);
$member4 = new Member('member4', 'member4', 10);
$member5 = new Member('member5', 'member5', 10);

$admin1 = new Admin('admin1', 'admin1', 10, MemberLevel::Admin);
$admin2 = new Admin('admin2', 'admin2', 10, MemberLevel::SuperAdmin);

echo "Member count : " . Member::count() . PHP_EOL;
echo "Admin count : " . Admin::count() . PHP_EOL;

unset($member1);

echo "Member count : " . Member::count() . PHP_EOL;
echo "Admin count : " . Admin::count() . PHP_EOL;
