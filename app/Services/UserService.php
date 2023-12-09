<?php

namespace App\Services;

use App\Models\User;
use App\Transformers\UserTransformer;

class UserService
{
    public function __construct(private readonly User $model){}

    public function getAllUsers()
    {
        $model = $this->model->all();

        return fractal()
            ->collection($model)
            ->transformWith(new UserTransformer())
            ->toArray()['data'];
    }

    public function getUserById($id): array
    {
        $model = $this->model::findOrFail($id);

        return fractal()
            ->item($model)
            ->transformWith(new UserTransformer())
            ->toArray()['data'];
    }

    public function createUser(array $data): array
    {
        $model = $this->model::create($data);

        return fractal()
            ->item($model)
            ->transformWith(new UserTransformer())
            ->toArray()['data'];
    }

    public function updateUser($id, array $data): array
    {
        $model = $this->model::findOrFail($id);

        $model->update($data);

        return fractal()
            ->item($model->fresh())
            ->transformWith(new UserTransformer())
            ->toArray()['data'];
    }

    public function deleteUser($id): void
    {
        $model = $this->model::findOrFail($id);

        $model->delete();
    }
}
