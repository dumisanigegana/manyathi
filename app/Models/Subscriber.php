<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'subscribers';

    public $orderable = [
        'account', 'user_id', 'dob', 'address', 'city', 'country', 'code', 'cell', 'identity', 'parent_id', 'subphase_id'
    ];

    public $filterable = [
        'account', 'user_id', 'dob', 'address', 'city', 'country', 'code', 'cell', 'identity', 'parent_id', 'subphase_id'
    ];

    protected $fillable = [
        'account', 'user_id', 'dob', 'address', 'city', 'country', 'code', 'cell', 'identity', 'parent_id', 'subphase_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'dob'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subphase()
    {
        return $this->belongsTo(Subphase::class);
    }

    public function parent()
    {
        return $this->belongsTo(Subsriber::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Subsriber::class, 'parent_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
