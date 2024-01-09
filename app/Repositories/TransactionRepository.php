<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function store()
    {
        return $this->model->store();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}
