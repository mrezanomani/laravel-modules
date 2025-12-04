<?php

namespace Modules\Acl\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Acl\Database\Factories\RoleFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

    protected $fillable = ['name', 'slug', 'guard_name', 'status'];


    public function user()
    {
        return $this->belongsTo(\Modules\User\Models\User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // protected static function newFactory(): RoleFactory
    // {
    //     // return RoleFactory::new();
    // }
}
