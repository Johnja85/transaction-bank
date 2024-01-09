<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Third_account extends Model
{
    use HasFactory;

    protected $fillable = [
        'idaccount',
        'description',
        'name_third',
        'created_by_id',
        'active'
    ];
}