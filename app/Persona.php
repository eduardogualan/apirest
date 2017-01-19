<?php

namespace sw;

use Illuminate\Database\Eloquent\Model;
class Persona extends Model
{
    protected $table = 'persona';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = [ 'nombres', 'cedula','nota1','nota2','promedio'];
    
    public function User() {
        return $this->hasOne('\sw\User');
    }
}
