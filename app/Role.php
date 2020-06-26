<?php

namespace App;
//use GeniusTS\Roles\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   protected $fillable=['name','slug', 'description'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
