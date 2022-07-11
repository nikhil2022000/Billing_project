<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relation_number extends Model
{
    use HasFactory;
    protected $table= 'relation_number';
    protected $fillable = [
        'operator',
        'number',
    ];
}

