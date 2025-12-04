<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\User\Database\Factories\UserMetaFactory;

class UserMeta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // protected static function newFactory(): UserMetaFactory
    // {
    //     // return UserMetaFactory::new();
    // }
}
