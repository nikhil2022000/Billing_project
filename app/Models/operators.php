<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operators extends Model
{
    use HasFactory;
    protected $table= 'operator';
    protected $fillable = [
        'operator',
        'billing_cat',
    ];
}
