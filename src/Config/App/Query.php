<?php

namespace App\Config\App;

use PDO;

class Query
{
    private PDO $con;

    public function __construct()
    {
        $this->con = Database::getConnection();
    }

    public function select(string $sql, array $params = []): ?array
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll(string $sql): array
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(string $sql, array $datos): int
    {
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($datos) ? 1 : 0;
    }

    public function insert(string $sql, array $datos): false|int|string
    {
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($datos) ? $this->con->lastInsertId() : 0;
    }
}
