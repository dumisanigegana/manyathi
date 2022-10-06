<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Transaction extends Model implements AuditableContract
{
    // use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'transactions';

    public $orderable = [
        'id',
        'amount',
        'reference',
        'email',
        'credit',
        'fullname',
        'confirmed',
        'transaction_date',
    ];

    public $filterable = [
        'id',
        'amount',
        'reference',
        'email',
        'credit',
        'fullname',
        'confirmed',
        'transaction_date',
    ];

    protected $fillable = [
        'amount',
        'reference',
        'email',
        'credit',
        'fullname',
        'confirmed',
        'transaction_date',
    ];

    protected $dates = [
        'transaction_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTransactionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
