<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Acheivement extends Model implements AuditableContract
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];


    public $orderable = [
        'id',
        'subscriber_id',
        'comments',
        'subphase_id',
        'status'
    ];

    public $filterable = [
        'id',
        'subscriber_id',
        'comments',
        'subphase_id',
        'status'
    ];

    protected $fillable = [
        'subscriber_id',
        'comments',
        'subphase_id',
        'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

   /**
    * Get the subscriber that owns the Acheivement
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function subscriber(): BelongsTo
   {
       return $this->belongsTo(Subscriber::class);
   }

   /**
    * Get the subphase that owns the Acheivement
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function subphase(): BelongsTo
   {
       return $this->belongsTo(Subphase::class);
   }
   

}
