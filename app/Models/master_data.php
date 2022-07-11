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
        'service_type',
        'relationship_no',
        'payment_units',
        'payment_mode',
        'plan_details',
        'operator',
        'bill_date',
        'billing_cycle_from',
        'billing_cycle_to',
        'grace_days',
        'due_date',
        'billing_type',
        'email',
        'mobile_no',
        'security_deposit',
        'custmoer_gst_no',
        'biller_gst_number',
        'state',
        'branch_location',
        'monthly_cr_limit',
        'get_billing_details_from',
    ];
}
