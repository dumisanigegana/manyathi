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
        'phase_id',
        'possition',
        'description',
        'action',
        'data'
    ];

    public $filterable = [
        'id',
        'name',      
        'phase_id',
        'possition',
        'description',
        'action',
        'data'
    ];

    protected $fillable = [
        'name',    
        'phase_id',
        'possition',
        'description',
        'action',
        'data'
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
    
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get all of the acheivments for the Subscriber
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acheivments(): HasMany
    {
        return $this->hasMany(Acheivment::class);
    }

}
