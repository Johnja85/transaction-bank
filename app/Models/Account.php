<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const IS_ACTIVE = true;

    protected $fillable = [
        'idaccount',
        'description',
        'balance',
        'created_by_id',
        'is_active'
    ];
}
