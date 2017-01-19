<?php namespace sw\Transformers;
use League\Fractal\TransformerAbstract;
use sw\User;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserTransformer extends TransformerAbstract{
    /**
     * 
     * @param User $user
     * @return type
     */
    public function transform(User $user){
        return [
            'identificador'=>$user->id,
            'cedula'=>$user->usuario,
            'fecha_creado'=>$user->created_at
        ];
    }
}

