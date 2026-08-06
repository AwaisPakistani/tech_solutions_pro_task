<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\{Fillable, Hidden};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\{Builder, SoftDeletes};
use Spatie\Permission\Traits\HasRoles;

use App\Traits\{ScopeTrait, creator, updator};
use Database\Factories\UserFactory;
#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable,HasRoles, ScopeTrait, creator, updator, SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
    public function hasPermission($permission)
    {
        return ($this->hasRole('Super Admin') ? true :  $this->roles->flatMap->permissions->contains('name', $permission));
    }
    /**
     * Perform pre-authorization checks on the model.
     */
    public function scopeSearch($query, $search)
    {
        return $query->whereAny(
            ['name', 'email'],
            'like',
            "%{$search}%"
        );
    }

    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        return null; // see the note above in Gate::before about why null must be returned here.
    }
}
