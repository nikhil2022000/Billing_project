<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mini_master extends Model
{
    use HasFactory;
    protected $table= 'mini_master';
    protected $fillable = [
        'sr_no',
        'operator',
        'assigned_to',
        'number',
        'plan_details',
        'branch_locaiton',
        'status',
    ];
}
