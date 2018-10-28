<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
class Permission extends EntrustPermission
{
    public function admins()
    {
        return $this->belongsToMany('App\Models\Admin', 'role_admin', 'role_id', 'admin_id');
    }
}
