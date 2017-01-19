<?php

namespace sw\Http\Controllers;

use Illuminate\Http\Request;

use sw\Http\Requests;
use Dingo\Api\Routing\Helpers;
use Authorizer;
use Auth;

class OAuth2 extends Controller
{
    use Helpers;
    /**
     * Metodo pata autorizar API REST para maquinas ejemplo comunicacion de maquina a maquina aplicaciones moviles netre otros
     * @return type
     */
    public function Autorizacion() {
        return $this->response->array(Authorizer::issueAccessToken());
    }
    
    /**
     * Metodo para autizar API REST mediante logueo o inicio de sesion con un usuario y contrase;a
     * @param type $usuario
     * @param type $password
     * @return boolean
     */
    public function AutorizacionPassword($usuario, $password) {
        $credentials = [
            "usuario" => $usuario,
            "password" => $password
        ];
        if(Auth::once($credentials)){
            return Auth::user()->id;
        }
        return false;
    }
}
