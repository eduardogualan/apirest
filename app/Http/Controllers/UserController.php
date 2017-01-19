<?php

namespace sw\Http\Controllers;

use Illuminate\Http\Request;
use sw\Http\Requests;
use sw\User;
use Dingo\Api\Routing\Helpers;
use sw\Transformers\UserTransformer;

class UserController extends Controller {

use Helpers;
    /**
     * 
     * @return type
     */
    public function index() {
        //responder como coleccion de datos 
      // return $this->response->collection(User::all(), new UserTransformer());
        //reponder informacion con paginacionn => paginate  recibe como parametro el numero de respuestas k quereremos presentar
       return $this->response->paginator(User::paginate(10), new UserTransformer());
    }
    
    /**
     * 
     * @param Request $request
     */
    public function store(Request $request) {
        $data = $request->except('password');
        $data['password'] = bcrypt($data['password']);
        $user = User::create($request->all());
        return $this->response->item($user, new UserTransformer());
    }
  
    
}
