<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class lib_baskets extends Model  implements AuditableContract
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'lib_baskets';
    protected $primaryKey ='id';
    protected $fillable = [
        'basket_code',
        'basket_item',
        'basket_amount',
        'from',
        'to',
        'sku',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
