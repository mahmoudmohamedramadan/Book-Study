<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Scopes\GlobalScope;
use App\Models\PhoneNumber;
use App\Models\Department;
use App\Models\Comment;
use App\Models\Post;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be visible for arrays.
     *
     * @var array
     */
    protected $visible = [
        'name', 'email',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //PUT HERE SOME COLUMNS TO MUTATED AS TIMESTAMPS, BY DEFAULT THIS ARRAY CONTAINS created_at AND updated_at
    protected $dates = [
        'created_at'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function department()
    {
        return $this->morphOne(Department::class, 'departmentable');
    }

    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope('Global', function ($builder) {
        //     $builder->where('id', '>', 5);
        // });

        static::addGlobalScope(new GlobalScope());
    }

    //MUTATORS WORK THE SAME WAY AS ACCESSORS WORK, EXCEPT THE MUTATORS HOW TO SETTING OT GETTING THE DATA
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function phoneNumbers()
    {
        //WHEN YOU WANT A RELATIONSHIP WITH SPECIFIC TABLE VIA ANOTHER TABLE
        // return $this->hasManyThrough(PhoneNumber::class, Contact::class);
        return $this->hasOneThrough(PhoneNumber::class, Contact::class);
    }
}
