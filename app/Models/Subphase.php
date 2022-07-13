<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subphase extends Model implements AuditableContract
{   
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'subphases';

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
        'description'
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
    
    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }
}
