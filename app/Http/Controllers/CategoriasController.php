<?php namespace artes\Http\Controllers;

use Illuminate\Support\Facades\DB;
use artes\Categorias;
use artes\Produto;
use artes\CategoriaProduto;
use Request;

class CategoriasController extends Controller {
    
    private $totalPaginas = 5;

    public function __construct(){
        /*$this->middleware('auth',
            ['only' => ['novo', 'adiciona','remove']]);
    }*/
        $this->middleware('auth');
    }

    public function lista (){
        
        //$categorias = Categorias::all()->orderBy('categoria', 'desc');
        $categorias = DB::table('categorias')->select('id','categoria')->orderBy('categoria', 'asc')->paginate($this->totalPaginas);
        
        return view('categorias')->withCategorias($categorias);

    }

    public function mostra(){
        $id = Request::input('id');

        //$produtos = DB::select('select * from produtos where categoria = ?', [$id]);
        //return view('produtos')->withProdutos($produtos);
        $categoriaProduto = DB::select('select * from categoria_produtos c join produtos p where p.id = c.idProduto and c.idCategoria = ?', [$id]);
        return view('produtos')->withProdutos($categoriaProduto)->withInput(Request::only('categoria'));
        //return $categoriaProduto;
    }

    public function novo(){

        return view('novaCategoria');
    }

    public function adiciona(){

        $categoria = Request::input('categoria');

        DB::table('categorias')->insert([
            'categoria'=> $categoria
        ]);

       //return redirect()->route('listaCategoria')->withInput(Request::only('categoria'));
       return redirect()->route('listaCategoria')->with('mensagem','Categoria cadastrada com sucesso!');
        
    }

    public function remove(){
        $id = Request::input('id');
        $fotos = DB::select('select c.id from categoria_produtos c where c.idCategoria = ?', [$id]);
        if(empty($fotos)){
        $categorias = Categorias::find(Request::input('id'));
        $categorias->delete();
        
        return redirect()->action('CategoriasController@lista')->with('mensagem','Categoria excluida com sucesso.');
        }
        else
        {
            return redirect()->action('CategoriasController@lista')->with('mensagem','Categoria não pode ser removida. Existem produtos vinculados a esta categoria');
        }

    }
    
}