<?php

require 'vendor/autoload.php';

use App\UserService;

$pdo = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8mb4", 'root', 'example', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$userService = new UserService($pdo);

$data = $userService->loadData([1,2]);
foreach ($data as $user_id => $name) {
    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
}
