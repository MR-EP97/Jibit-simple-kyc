<?php

namespace App\Services;

use App\Interfaces\Repository\ProfileRepositoryInterface;
use App\Models\Profile;

class ProfileService
{
    public function __construct(
        protected ProfileRepositoryInterface $profileRepository
    )
    {
    }

    public function create(array $data)
    {
        return $this->profileRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->profileRepository->update($data, $id);
    }

    public function delete($id)
    {
        $this->profileRepository->delete($id);
    }

    public function all(int $perPage = 10)
    {
        return $this->profileRepository->all($perPage);
    }

    public function find($id)
    {
        return $this->profileRepository->find($id);
    }

    public function findByNationalId($national_id)
    {
        return $this->profileRepository
            ->query()
            ->where('national_id', $national_id)
            ->first();
    }
}
