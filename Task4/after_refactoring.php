<?php

require 'vendor/autoload.php';

use App\UserService;

$config = include 'config.php';

$pdo = new PDO($config['dsn'], $config['user'], $config['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$userService = new UserService($pdo);

$data = $userService->loadData([1,2]);

foreach ($data as $user_id => $name) {
    // escape string here
    echo '<a href=\"/show_user.php?id='. htmlspecialchars($user_id).'">' . htmlspecialchars($name) . '</a>';
}
