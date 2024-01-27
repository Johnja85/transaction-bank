<?php

namespace App\MethodFactory\Accounts\Interfaces;


interface FactoryAccountInterface
{
   public function create(array $data);

   public function get();   
}