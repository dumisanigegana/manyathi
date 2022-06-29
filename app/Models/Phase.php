<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phase extends Model
{    
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'phases';

    public $orderable = [
        'id',
        'phase',
    ];

    public $filterable = [
        'id',
        'phase',
    ];

    protected $fillable = [
        'phase',
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
}
