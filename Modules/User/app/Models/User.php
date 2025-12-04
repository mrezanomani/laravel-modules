<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\User\Database\Factories\UserFactory;
use Modules\Acl\Traits\HasRolesAndPermissions;


class User extends Model
{
    use HasFactory , HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];




    // protected static function newFactory(): UserFactory
    // {
    //     // return UserFactory::new();
    // }
}
