<?php namespace artes\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use artes\Produto;
use artes\Categorias;
use artes\Imagem;
use artes\CategoriaProduto;
use Request;
use Validator;

class ProdutoController extends Controller {
    
    private $totalPaginas = 5;

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function lista (){

        //$produtos = Produto::all();
        $produtos = Produto::paginate($this->totalPaginas);

        return view('produtos')->withProdutos($produtos);

    }

    public function mostra($id){
        //Dados do produto
        $produto = Produto::find($id);
        //lista de fotos do produto
        $fotos = DB::select('select * from imagems i where i.idProduto = ?', [$id]);
        //lista de categorias associadas ao produto
        $categoriasProduto = DB::select('SELECT c.id, c.categoria, cp.id as idProdCat FROM categorias c join categoria_produtos cp where c.id = cp.idCategoria and cp.idProduto = ? and c.id in (select c.id as idCategoria from categoria_produtos cp join categorias c join produtos p where c.id = cp.idCategoria and cp.idProduto = p.id and cp.idProduto = ?) order by c.categoria', [$id, $id]);
        //lista de categorias não associadas ao produto
        $categorias = DB::select('SELECT * FROM categorias c where c.id not in (select c.id as idCategoria from categoria_produtos cp join categorias c join produtos p where c.id = cp.idCategoria and cp.idProduto = p.id and cp.idProduto = ?) order by c.categoria', [$id]);

        if(empty($produto)){

            return view('erros');

        }

        return view('detalhes')->with(array('p'=>$produto, 'fotos'=>$fotos, 'categoriasProduto'=>$categoriasProduto, 'categorias'=>$categorias));
    }

    public function novo(){

        return view('novoProduto');

    }

    public function adiciona(){

        $validator = Validator::make(
            [
                'nome' => Request::input('nome'),
                'valor' => $this->moeda(Request::input('valor')),
                'quantidade' => Request::input('quantidade'),
                'descricao' => Request::input('descricao')
            ],
            [
                'nome' => 'required|min:5',
                'valor' => 'required|numeric',
                'quantidade' => 'required|numeric',
                'descricao' => 'required|min:5'
            
            ]
        );

        if ($validator->fails()){

            return redirect()->action('ProdutoController@novo');

        }

        $produto = new Produto();
        $produto->nome = Request::input('nome');
        $produto->valor = $this->moeda(Request::input('valor'));
        $produto->quantidade = Request::input('quantidade');
        $produto->descricao = Request::input('descricao'); 
        $produto->save();

        //-----salvando fotos
        foreach ($_FILES['foto']['error'] as $key => $error){
            
            if ($error == UPLOAD_ERR_OK){
                
                $foto = Request::file('foto')[$key];
                $fotoNome = md5(rand(11111, 99999)).'.JPG';
                $destinationPath = 'C:\xampp\php\artes\public\img/';
                $foto->move($destinationPath, $fotoNome);
                
                $salvaFoto = new Imagem();
                $salvaFoto->idProduto = $produto->id;
                $salvaFoto->nome = $fotoNome;
                $salvaFoto->save();

            }
            
        }
        //-----salvando categorias
       
        $listaCategoria = Request::input('categoria');
        
        foreach($listaCategoria as $idCategoria){
            
            $salvaCategoria = new CategoriaProduto();
            $salvaCategoria->idCategoria = $idCategoria;
            $salvaCategoria->idProduto = $produto->id;
            $salvaCategoria->save();
            
        }
      
       return redirect()->route('listaProduto')->with('mensagem','Produto cadastrado com sucesso');
       
    }

    public function remove(){
        
        $id = Request::input('id');
        $produto = Produto::find(Request::input('id'));
        $produto->delete();
        DB::table('categoria_produtos')->where('idProduto', '=', Request::input('id'))->delete();
        
        $fotos = DB::select('select i.nome from imagems i where i.idProduto = ?', [$id]);
        
        foreach($fotos as $foto){
            unlink('C:\xampp\php\artes\public\img/'.$foto->nome);
        }
        DB::table('imagems')->where('idProduto', '=', Request::input('id'))->delete();
      
        return redirect()->route('listaProduto')->with('mensagem','Produto removido com sucesso!');

    }

    public function edita($id){

        $produto = Produto::find($id);
        
        return view('editaProduto')->with('p', $produto);
        /*
        $categorias_produto = DB::select('select c.categoria, cp.idProduto from categoria_produtos cp join categorias c where c.id = cp.idCategoria and cp.idProduto = ?', [$id]);
        $resultado = array_merge($produto, $categorias_produto);
        return $resultado;*/
        
        //$categorias = DB::table('categoria_produtos')->select('id','categoria')->orderBy('categoria', 'asc')->get();
        //return view('produtoCategoria')->withCategorias($categorias);
        //return view('editaProduto')->with('p', $produto)->with('c', $categorias_produto);

    }

    public function salvaEdicao(){
        
        DB::table('produtos')->where('id', Request::input('id'))->update([
            'nome'=> Request::input('nome'), 
            'valor' => $this->moeda(Request::input('valor')), 
            'quantidade' => Request::input('quantidade'), 
            'descricao' => Request::input('descricao')
        ]);
        $idProduto = Request::input('id');
        
        return redirect()->route('detalheProduto',$idProduto);
        
        //return redirect()->action('ProdutoController@lista');
        //return redirect()->action('ProdutoController@lista')->with('mensagem','Produto removido com sucesso!');

    }
    
    public function removeFoto(){
        
        unlink('C:\xampp\php\artes\public\img/'.Request::input('nome'));
        DB::table('imagems')->where('id', '=', Request::input('id'))->delete();
        $idProduto = Request::input('idProduto');
        
        return redirect()->route('detalheProduto',$idProduto);
    
    }
    
    public function adicionaFoto(){
        
        //-----salvando fotos
        $idProduto = Request::input('id');
        foreach ($_FILES['foto']['error'] as $key => $error){
            
            if ($error == UPLOAD_ERR_OK){
                
                $foto = Request::file('foto')[$key];
                $fotoNome = md5(rand(11111, 99999)).'.JPG';
                $destinationPath = 'C:\xampp\php\artes\public\img/';
                $foto->move($destinationPath, $fotoNome);
                
                $salvaFoto = new Imagem();
                $salvaFoto->idProduto = $idProduto;
                $salvaFoto->nome = $fotoNome;
                $salvaFoto->save();
                
                return redirect()->route('detalheProduto',$idProduto);

            }
            
        }
        
    }
    
    public function adicionaCategoria(){
        
        //-----salvando categorias
       
        $idCategoria = Request::input('id');
        $idProduto = Request::input('idProduto');
            $salvaCategoria = new CategoriaProduto();
            $salvaCategoria->idCategoria = $idCategoria;
            $salvaCategoria->idProduto = $idProduto;
            $salvaCategoria->save();
        
        return redirect()->route('detalheProduto',$idProduto);
    }
    
    public function removeCategoria(){
        
        //-----salvando categorias
       
        $idProdCat = Request::input('idProdCat');
        $idProduto = Request::input('idProduto');
        
        $categoriaProduto = CategoriaProduto::find($idProdCat);
        $categoriaProduto->delete();
        
        return redirect()->route('detalheProduto',$idProduto);
    }
    
    public function moeda($get_valor) {
        
	   $source = array('.', ','); 
	   $replace = array('', '.');
	   $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
	   return $valor; //retorna o valor formatado para gravar no banco
        
    }

}