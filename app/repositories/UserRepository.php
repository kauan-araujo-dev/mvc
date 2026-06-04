<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\User;

class UserRepository{
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function findAll(): ?array{
        $sql = $this->connection->query("SELECT * FROM usuarios");
        $users = $sql->fetchAll();
        $userModels = [];
        foreach($users as $user){
            array_push($userModels, new User($user['id'], $user['nome']));
        }
        return $userModels ?: null;
        }
}