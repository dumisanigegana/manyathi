<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable  implements AuditableContract, MustVerifyEmail
{
    // use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Notifiable;
    use \OwenIt\Auditing\Auditable;

    public $table = 'users';

    public $orderable = [
        'id',
        'fname',
        'mname',
        'lname',
        'username',
        'email',
        'email_verified_at',
    ];

    public $filterable = [
        'id',
        'fname',
        'mname',
        'lname',
        'username',
        'email',
        'email_verified_at',
        'roles.title',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'username',
        'email',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function getFullnameAttribute()
    {
        return $this->fname. ' ' . $this->mnames . ' ' . $this->lname;
    }

    public function account(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    // public function setUsernameAttribute()
    // {
    //     $this->attributes['username'] = $this->subscriber->account;
    // }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    
    public function subscriber()
    {
        return $this->hasOne(Subscriber::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($name)
    {
        foreach ($this->roles()->get() as $role)
        {
            //if ($role->title == 'Admin')
            if ($role->title == $name)
            {
                return true;
            }
        }
        return false;        
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

     /**
     * Enter your own logic (e.g. if ($this->id === 1) to
     *   enable this user to be able to add/edit blog posts
     *
     * @return bool - true = they can edit / manage blog posts,
     *        false = they have no access to the blog admin panel
     */
    public function canManageBinshopsBlogPosts()
    {
        // Enter the logic needed for your app.
        // Maybe you can just hardcode in a user id that you
        //   know is always an admin ID?

        // if (       $this->id === 1
        //      && $this->email === "admin@admin.com"
        //    ){
        if ($this->hasRole('Admin')) {

           // return true so this user CAN edit/post/delete
           // blog posts (and post any HTML/JS)

           return true;
        }

        // otherwise return false, so they have no access
        // to the admin panel (but can still view posts)

        return false;
    }
}
