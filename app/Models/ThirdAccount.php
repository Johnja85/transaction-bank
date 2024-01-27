<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdAccount extends Model
{
    use HasFactory;

    const ACTIVE = true;
    const INACTIVE = false;

    protected $table = "third_accounts";
    
    protected $fillable = [
        'idaccount',
        'description',
        'balance',
        'name_third',
        'created_by_id',
        'is_active'
    ];
}
