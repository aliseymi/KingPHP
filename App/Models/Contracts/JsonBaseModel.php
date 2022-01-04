<?php

namespace App\Models\Contracts;

class JsonBaseModel extends BaseModel
{
    private $db_folder;
    private $table_filepath;

    public function __construct()
    {
        $this->db_folder = BASE_PATH . '/storage/json_db/';
        $this->table_filepath = $this->db_folder . $this->table . '.json';
    }

    private function write_table(array $data)
    {
        $json_data = json_encode($data);

        file_put_contents($this->table_filepath, $json_data);
    }

    private function read_table()
    {
        return json_decode(file_get_contents($this->table_filepath));
    }

    # Create (Insert)
    public function create(array $data): int
    {
        $table_data = $this->read_table();

        $table_data[] = $data;
        
        $this->write_table($table_data);

        return $data[$this->primaryKey];
    }

    # Read (select) single | multiple
    public function find($id): object
    {
        $table_data = $this->read_table();

        foreach($table_data as $row){

            if($row->{$this->primaryKey} == $id){
                return $row;
            }

        }
        return null;
    }

    // TODO: should implement
    public function get(array $columns, array $where): array
    {
        return [];
    }

    public function getAll(): array
    {
        return $this->read_table();
    }

    # Update
    // TODO: should implement
    public function update(array $data, $where): int
    {
        return 1;
    }

    # Delete 
    // TODO: should implement
    public function delete(array $where): int
    {
        return 1;
    }
}
