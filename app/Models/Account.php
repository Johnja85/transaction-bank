<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const ACTIVE = true;
    const INACTIVE = false;

    protected $fillable = [
        'idaccount',
        'description',
        'balance',
        'created_by_id',
        'active'
    ];
}
