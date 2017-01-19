<?php

namespace sw\Http\Controllers;

use Illuminate\Http\Request;
use sw\Http\Requests;
use Dingo\Api\Routing\Helpers;
use sw\Transformers\PersonaTransformer;
use sw\Persona;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PersonaController extends Controller {

    use Helpers;

    /**
     * Funcion que permite listar todas las personas
     * @see Direccion: /api/persona METODO GET
     */
    public function index() {
        // return $this->response->collection(\sw\Persona::all(), new PersonaTransformer());
        return $this->response->paginator(Persona::paginate(10), new PersonaTransformer());
    }

    /**
     * Funcion que permite registrar Personas 
     * @see Direccion: /api/persona   METODO POST
     * @param Request $request
     */
    public function store(Request $request) {
        $persona = Persona::create($request->all());
        return $this->response->item($persona, new PersonaTransformer());
    }

    /**
     * Funcion para consultar datos de una persona por numero de cedula
     * @see Direccion: /api/persona/{cedula}    METODO GET
     * @param type $cedula
     * @return type
     */
    public function show($cedula) {
        try {
            $persona = Persona::where('cedula', $cedula)->get()->first();
            if($persona){
                return $this->response->item($persona, new PersonaTransformer());
            }else{
                return response()->json(["status_code"=>"404","messenge"=>"not found"]); 
            }
        } catch (ModelNotFoundHttpException $exc) {
            throw new NotFoundHttpException;
        }
    }

}
