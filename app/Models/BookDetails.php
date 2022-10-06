<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
// use Illuminate\Database\Eloquent\Factories\HasFactory
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\SoftDeletes;


class BookDetails extends Model implements AuditableContract
{
     use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'book_details';
    
    public $orderable = [
        'transaction_id',
        'security',
    ];

    public $filterable = [
        'security',
    ];

    protected $fillable = [
        'transaction_id',
        'security',
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
