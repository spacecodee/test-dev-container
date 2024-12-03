<?php

namespace App\Models;

use App\Config\App\Query;

class UserModel
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM usuarios WHERE correo = :email AND estado = 1";
        return $this->query->select($sql, ['email' => $email]);
    }
}
