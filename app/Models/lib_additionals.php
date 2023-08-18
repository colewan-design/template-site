<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class lib_additionals extends Model implements AuditableContract
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'lib_additionals';
    protected $primaryKey ='id';
    protected $fillable = [
        'category',
        'additional_name',
        'additional_description',
        'amount',
        'additional_code',
        'sku',
        'additional_amount',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
