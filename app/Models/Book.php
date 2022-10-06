<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model implements AuditableContract
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public $table = 'books';
    
    public $orderable = [
        'title',
        'author',
        'price',
        'path',
    ];

    public $filterable = [
        'title',
        'author',
        'price',
        'path',
    ];

    protected $fillable = [
        'subphase_id',
        'title',
        'author',
        'price',
        'path',
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
}
