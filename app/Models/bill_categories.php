<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_categories extends Model
{
    use HasFactory;
    protected $table= 'category_name';
    protected $fillable = [
        'category_name',
    ];
}
