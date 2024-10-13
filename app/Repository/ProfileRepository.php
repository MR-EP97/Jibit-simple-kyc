<?php

namespace App\Repository;

use App\Interfaces\Repository\ProfileRepositoryInterface;
use App\Models\Profile;

class ProfileRepository implements ProfileRepositoryInterface
{

    public function all(int $page)
    {
        return Profile::paginate($page);
    }

    public function query()
    {
        return Profile::query();
    }

    public function create(array $data)
    {
        return Profile::create($data);
    }

    public function update(array $data, $id)
    {
        return Profile::query()->updateOrCreate(
            ['id' => $id],
            [$data]
        );
    }

    public function delete($id)
    {
        $profile = Profile::query()->find($id);
        $profile->delete();
    }

    public function find($id)
    {
        return Profile::find($id);
    }
}
