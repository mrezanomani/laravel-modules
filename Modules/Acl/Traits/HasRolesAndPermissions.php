<?php
namespace Modules\Acl\Traits;

use Modules\Acl\Models\Role;
use Modules\Acl\Models\Permission;

trait HasRolesAndPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string|array $roles): bool
    {
        $roles = (array) $roles;

        return $this->roles()->whereIn('slug', $roles)->exists();
    }

    public function giveRole(string $roleSlug): static
    {
        $role = Role::where('slug', $roleSlug)->firstOrFail();
        $this->roles()->syncWithoutDetaching([$role->id]);

        return $this;
    }

    public function permissions()
    {
        // از طریق roleها
        return Permission::whereHas('roles', function ($q) {
            $q->whereIn('roles.id', $this->roles->pluck('id'));
        });
    }

    public function hasPermission(string $permissionSlug): bool
    {
        return Permission::where('slug', $permissionSlug)
            ->whereHas('roles', function ($q) {
                $q->whereIn('roles.id', $this->roles->pluck('id'));
            })
            ->exists();
    }
}
