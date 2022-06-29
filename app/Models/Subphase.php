<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subphase extends Model
{   
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'subphases';

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
    
    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }
}
