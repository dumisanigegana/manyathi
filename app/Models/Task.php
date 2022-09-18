<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Task extends Model implements AuditableContract
{
    use HasAdvancedFilter; 
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'tasks';

    public $orderable = [
        'name', 'position', 'subphase_id'
    ];

    public $filterable = [
        'name', 'position', 'subphase_id'
    ];

    protected $fillable = [
        'name', 'position', 'subphase_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts = [
        'dob ' => 'Y-m-d',
      ];

    
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
    
    public function subphase()
    {
        return $this->belongsTo(Subphase::class);
    }
}
