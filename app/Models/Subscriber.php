<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Subscriber extends Model implements AuditableContract
{
    
    use HasAdvancedFilter; 
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'subscribers';

    public $orderable = [
        'account', 'user_id', 'dob', 'address', 'gender', 'city', 'country', 'cell', 'identity', 'referee_id', 'subphase_id'
    ];

    public $filterable = [
        'account', 'user_id', 'dob', 'address', 'gender', 'city', 'country', 'cell', 'identity', 'referee_id', 'subphase_id'
    ];

    protected $fillable = [
        'account', 'user_id', 'dob', 'address', 'gender', 'city', 'country', 'cell', 'identity', 'avatar', 'referee_id', 'subphase_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts = [
        'dob ' => 'Y-m-d',
      ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subphase()
    {
        return $this->belongsTo(Subphase::class);
    }

    public function referee()
    {
        return $this->belongsTo(Subscriber::class, 'referee_id');
    }

    public function desciples()
    {
        return $this->hasMany(Subscriber::class, 'referee_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getBirthAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['dob'])->format('d/m/Y');
    }

}
