<?php

namespace App\Models\Contracts;

interface CrudInterface
{

    # Create (Insert)
    public function create(array $data): int;

    # Read (select) single | multiple
    public function find($id): object;

    public function get(array $columns, array $where): array;

    # Update
    public function update(array $data, $where): int;

    # Delete
    public function delete(array $where): int;
}