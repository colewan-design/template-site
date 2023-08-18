<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'customer_fname',
        'customer_lname',
        'customer_ref',
        'user_email',
        'password',
        'contact_number',
        'main_delivery_addr_house_num',
        'main_delivery_addr_brgy_code',
        'main_delivery_addr_muncity_code',
        'main_delivery_addr_province_code',
        'main_delivery_addr_brgy',
        'main_delivery_addr_muncity',
        'main_delivery_addr_province',
        'subplan',
        'subplan_ref',
        'lib_diet_type_refs',
        'lib_payment_method_refs',
        'bundles_refs',
        'delivery_schedule_ref',
        'registration_date',
        'approved_date',
        'subscription_cancelled_date',
        'delivery_frequency',
        'other_remarks',
        'isEnabled'
    ];
    protected $primaryKey = 'customer_id';
}
