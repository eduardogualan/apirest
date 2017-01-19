<?php

namespace sw;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    protected $table = 'users';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'usuario', 'password'];
    protected $hidden = ['remember_token'];
    
    public function Persona() {
        return $this->belongsTo('\sw\Persona');
    }

}
