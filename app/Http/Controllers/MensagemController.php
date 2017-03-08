<?php namespace artes\Http\Controllers;

use Illuminate\Support\Facades\DB;
use artes\Categorias;
use artes\Produto;
use Request;

class MensagemController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function erro (){
        
        //return view('mensagens');

    }

    public function sucesso (){
        

    }
    
}