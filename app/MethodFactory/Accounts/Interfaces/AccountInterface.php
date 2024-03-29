<?php

namespace App\MethodFactory\Accounts\Interfaces;

interface AccountInterface
{
    public function create(array $data);

    public function get();
}