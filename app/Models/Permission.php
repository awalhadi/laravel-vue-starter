<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission  extends SpatiePermission
{
    use HasFactory;

     //--------------------------------- Start properties -----------------------------------
    //--------------------------------- End properties -----------------------------------

    //--------------------------------- Start constants -----------------------------------
    //--------------------------------- End constants -----------------------------------

    //--------------------------------- Start accessors and mutators -----------------------------------
    //--------------------------------- End accessors and mutators ----------------------------------

    //--------------------------------- Start relationships -----------------------------------
    public function childs()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Permission::class, 'parent_id')->withDefault();
    }
    //--------------------------------- End relationships -----------------------------------
}
