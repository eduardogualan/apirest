<?php

namespace sw\Transformers;

use League\Fractal\TransformerAbstract;
use sw\Persona;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PersonaTransformer  extends TransformerAbstract{
    /**
     * Funcion que permite personalizar campos para luego enviar en formato JSON
     * @param Persona $persona
     * @return type
     */
    public function transform(Persona $persona) {
        return [
            'cedula' => $persona->cedula,
            'alias' => $persona->nombres,
            'nota1' => $persona->nota1,
            'nota2' => $persona->nota2,
            'promedio_final' => $persona->promedio,
        ];
    }

}
