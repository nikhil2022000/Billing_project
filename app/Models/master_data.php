<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_data extends Model
{
    use HasFactory;
    protected $table= 'master_data';
    protected $fillable = [
        'sr_no',
        'number',
        'assigned_to',
        'operator_type',
        'branch_location',
        'operator',
        'status',
        'plan_details',
        'payment_units',
        'payment_cycle',
        'monthly_rental_amount',
        'tds',
        'gst',
        'credit_limit',
        'security_deposit',
        'payment_mode',
        'bill_date',
        'billing_cycle_to',
        'billing_cycle_from',
        'grace_days',
        'due_date',
        'relationship_no',
        'mobile_no',
        'dsl_id',
        'custmoer_gst_no',
        'biller_gst_number',
        'state',
        'bill_open_password',
        'registered_id',
        'get_billing_details_from',
    ];
}
