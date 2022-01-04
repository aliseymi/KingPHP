<?php

namespace App\Models\Contracts;

use Exception;
use PDO;
use Medoo\Medoo;

class MysqlBaseModel extends BaseModel
{
    public function __construct()
    {
        try {
            $this->connection = new Medoo([
                // [required]
                'type' => 'mysql',
                'host' => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_NAME'],
                'username' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
             
                // [optional]
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'port' => 3306,
             
                // [optional] Table prefix, all table names will be prefixed as PREFIX_table.
                'prefix' => '',
             
                // [optional] Enable logging, it is disabled by default for better performance.
                'logging' => true,
             
                // [optional]
                // Error mode
                // Error handling strategies when error is occurred.
                // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
                // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
                'error' => PDO::ERRMODE_EXCEPTION,
             
            
                // [optional] Medoo will execute those commands after connected to the database.
                'command' => [
                    'SET SQL_MODE=ANSI_QUOTES'
                ]
            ]);
        } catch (Exception $e) {
            echo 'Connection Failed: ' . $e->getMessage();
        }
    }

    # Create (Insert)
    public function create(array $data): int
    {
        $this->connection->insert($this->table, $data);
        
        return $this->connection->id();
    }

    # Read (select) single | multiple
    public function find($id): object
    {
        $result = $this->connection->get($this->table, '*', [$this->primaryKey => $id]);
        return (object)$result;
    }

    public function get(array $columns, array $where): array
    {
        $records = $this->connection->select($this->table, $columns, $where); 

        return $this->convertToArrayOfObjects($records);
    }

    public function getAll(): array
    {
        $records = $this->connection->select($this->table, '*');

        return $this->convertToArrayOfObjects($records);
    }

    # Update
    public function update(array $data, array $where): int
    {
        $result = $this->connection->update($this->table, $data, $where);
        return $result->rowCount();
    }

    # Delete 
    public function delete(array $where): int
    {
        $result = $this->connection->delete($this->table, $where);
        return $result->rowCount();
    }

    public function count(array $where)
    {
        return $this->connection->count($this->table, $where);
    }

    public function sum(string $column, array $where)
    {
        return $this->connection->sum($this->table, $column, $where);
    }

    public function max(string $column, array $where)
    {
        return $this->connection->max($this->table, $column, $where);
    }

    public function min(string $column, array $where)
    {
        return $this->connection->min($this->table, $column, $where);
    }

    public function avg(string $column, array $where)
    {
        return $this->connection->avg($this->table, $column, $where);
    }

    private function convertToArrayOfObjects(array $array)
    {
        $array_of_objects = [];
        foreach($array as $record){
            $array_of_objects[] = (object)$record;
        }

        return $array_of_objects;
    }
}
