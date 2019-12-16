<?php
// better to accept array of id instead of string
// as well better to have a class instead of function
// to have ability inject Database connection for testability
function load_users_data($user_ids)
{
    $user_ids = explode(',', $user_ids);
    foreach ($user_ids as $user_id) {
        // hardcoded configuration should be located in separate file
        $db = mysqli_connect('127.0.0.1', 'root', 'example', 'test');
        // SQL Injection better to use PDO with prepare statement
        // WE should specify only data what we need (id, name)
        $sql = mysqli_query($db, "SELECT * FROM users WHERE id=$user_id");
        while ($obj = $sql->fetch_object()) {
            $data[$user_id] = $obj->name;
        }
        mysqli_close($db);
    }
    return $data;
}

// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48
$data = load_users_data('1,2');
foreach ($data as $user_id => $name) {
    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
}