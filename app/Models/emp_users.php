<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emp_users extends Model
{
    use HasFactory;
    protected $table= 'emp_users';
    protected $fillable = [
        'empid',
        'name',
    ];
}
