<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phase extends Model implements AuditableContract
{    
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'phases';

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

    public function subphases()
    {
        return $this->hasMany(Subphase::class);
    }

    /**
     * Get all of the subscribers for the Phase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function subscribers(): HasManyThrough
    {
        return $this->hasManyThrough(Subscriber::class, Subphase::class);
    }
}
