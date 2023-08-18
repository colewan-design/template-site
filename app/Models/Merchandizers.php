<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Merchandizers extends Model   implements AuditableContract
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'merchandizers';
    protected $primaryKey ='id';
    protected $fillable = [
        'name',
        'registered_name',
        'address',
        'email',
        'contact',
        'tin',
        'isEnabled',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
