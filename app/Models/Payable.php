<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Payable extends Model implements AuditableContract
{
    
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'payables';

    public $orderable = [
        'id',
        'name',
    ];

    public $filterable = [
        'id',
        'name',
    ];

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
