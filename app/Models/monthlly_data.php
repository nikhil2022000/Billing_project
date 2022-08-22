<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monthlly_data extends Model
{
    use HasFactory;
    protected $table= 'monthly_billing_data';
    protected $fillable = [
        'billable_id',
        'relationship_no',
        'operator',
        'operator_type',
        'number_of_connection',
        'payment_unit',
        'monthly_rental',
        'usages',
        'gst',
        'tds',
        'invoice_number',
        'bill_date',
        'due_date',
        'month',
        'checkbox',
        'hardcopy_invoice',
    ];
}
