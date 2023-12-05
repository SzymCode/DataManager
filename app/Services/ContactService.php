<?php

namespace App\Services;

use App\Models\Contact;
use App\Transformers\ContactTransformer;

class ContactService
{
    public function __construct(private readonly Contact $model){}

    public function getAllContacts()
    {
        $model = $this->model->all();

        return fractal()
            ->collection($model)
            ->transformWith(new ContactTransformer())
            ->toArray()['data'];
    }

    public function getContactById($id): array
    {
        $model = $this->model::query()->findOrFail($id);

        return fractal()
            ->item($model)
            ->transformWith(new ContactTransformer())
            ->toArray()['data'];
    }

    public function createContact(array $data): array
    {
        $model = $this->model::query()->create($data);

        return fractal()
            ->item($model)
            ->transformWith(new ContactTransformer())
            ->toArray()['data'];
    }

    public function updateContact($id, array $data): array
    {
        $model = $this->model::query()->findOrFail($id);

        $model->update($data);

        return fractal()
            ->item($model->fresh())
            ->transformWith(new ContactTransformer())
            ->toArray()['data'];
    }

    public function deleteContact($id): void
    {
        $model = $this->model::query()->findOrFail($id);

        $model->delete();
    }
}
