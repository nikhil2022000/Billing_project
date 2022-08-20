<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mini_master extends Model
{
    use HasFactory;
    protected $table= 'number_details';
    protected $fillable = [
        'sr_no',
        'assigned_to',
        'number',
        'plan_details',
        'branch_location',
        'status',
        'month',
    ];
}
