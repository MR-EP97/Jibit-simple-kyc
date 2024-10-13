<?php

namespace App\Interfaces\Repository;

interface ProfileRepositoryInterface
{
    public function all(int $page);

    public function query();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);
}
