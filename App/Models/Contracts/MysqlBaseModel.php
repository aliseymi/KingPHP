<?php

namespace App\Models\Contracts;

use PDO;
use PDOException;

class MysqlBaseModel extends BaseModel
{
    protected function __construct()
    {
        try {
            $this->connection = new PDO("mysql:dbname={$_ENV['DB_NAME']};host={$_ENV['DB_HOST']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            $this->connection->exec('set names utf8;');
        } catch (PDOException $e) {
            echo 'Connection Failed: ' . $e->getMessage();
        }
    }

    # Create (Insert)
    public function create(array $data): int
    {
        return 1;
    }

    # Read (select) single | multiple
    public function find($id): object
    {
        return (object)[];
    }

    public function get(array $columns, array $where): array
    {
        return [];
    }

    public function getAll(): array
    {
        return [];
    }

    # Update
    public function update(array $data, $where): int
    {
        return 1;
    }

    # Delete 
    public function delete(array $where): int
    {
        return 1;
    }
}
