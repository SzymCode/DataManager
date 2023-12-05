<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Contracts\ContactShouldReceiveFields;


class ContactTransformer extends TransformerAbstract
{
    public function transform(ContactShouldReceiveFields $model): array
    {
        return [
            'user_id' => $model->getUserId(),
        ];
    }
}
