<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class lib_cart_orders extends Model  implements AuditableContract
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'lib_cart_orders';
    protected $primaryKey ='id';
    protected $fillable = [
        'item_name',
        'sku',
        'item_code',
        'item_amount',
        'item_quantity',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
