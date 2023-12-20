<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function roles()
    {
        return $this->hasMany(Role::class, 'child_id')->orderBy('order');
    }


    public function childrenRoles()
    {
        return $this->hasMany(Role::class, 'child_id')->orderBy('order')->with('roles');

    }

}
