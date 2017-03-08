<?php namespace artes\Http\Controllers;

use Illuminate\Support\Facades\DB;
use artes\Categorias;
use artes\Produto;
use Request;

class ProdutoCategoriaController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function lista (){
        
        $categorias = DB::table('categorias')->select('id','categoria')->orderBy('categoria', 'asc')->get();
        return view('produtoCategoria')->withCategorias($categorias);

    }

    public function edita ($id){
        
        $categorias = DB::table('categorias')->select('id','categoria')->orderBy('categoria', 'asc')->get();
        return view('editaCategoriaProduto')->withCategorias($categorias);

    }
    
}