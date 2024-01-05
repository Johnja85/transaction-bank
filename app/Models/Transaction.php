<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // protected $table = 'transactions';

    protected $fillable = [
        'account',
        'destination_account',
        'value',
        'observation',
        'created_by_id'
    ];
}
