<?php
namespace App;

use PDO;

class UserService {

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array $userIds
     * @return array
     */
    public function loadData(array $userIds): array
    {
        $in = array_fill(0, count($userIds), '?');
        $in = implode(',', $in);

        $sql = "SELECT id, name FROM users WHERE id IN ($in)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($userIds);
        $data = [];
        while ($obj = $statement->fetchObject()) {
            $data[$obj->id] = $obj->name;
        }
        return $data;
    }
}