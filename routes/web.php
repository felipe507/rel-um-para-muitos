<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function(){
    $categorias = \App\Categoria::all();
    if(count($categorias) === 0)
        echo "<h3>Não existem categorias cadastradas</h3>";
    else{
        echo "<h3>Existem ".count($categorias)." categorias cadastradas</h3>";
        echo "<ul>";
        foreach($categorias as $categoria){
            echo "<li>".$categoria->nome."</li>";
        }
        echo "</ul>";
    }
});

Route::get('/produtos', function(){
    $produtos = \App\Produto::all();
    if(count($produtos) === 0)
        echo "<h3>Não existem produtos cadastradas</h3>";
    else{
        echo "<h3>Existem ".count($produtos)." produtos cadastradas</h3>";
        echo "<table>";
        echo "<thead>";
        echo "<tr><th>Nome</th><th>Preço</th><th>Estoque</th><th>Categoria</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($produtos as $produto){
            echo "<tr>";
            echo "<td>".$produto->nome."</td>";
            echo "<td>".$produto->estoque."</td>";
            echo "<td>".$produto->preco."</td>";
            echo "<td>".$produto->categoria->nome."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
});


Route::get('/categoriasprodutos', function(){
    $categorias = \App\Categoria::all();
    if(count($categorias) === 0)
        echo "<h3>Não existem categorias cadastradas</h3>";
    else{
        foreach($categorias as $cat){
            echo "<p>" . $cat->nome . "-" . $cat->id . "</p>";
            $produtos = $cat->produtos;

            if(count($produtos)>0){
                echo "<ul>";
                foreach($produtos as $prod){
                    echo "<li>" . $prod->nome . "</li>";
                }
                echo "</ul>";
            }

        }
    }
});

Route::get('/categoriasprodutos/json', function(){
    $categorias = \App\Categoria::with('produtos')->get();
    return $categorias->toJson();
});
//somente os dados de produtoss
Route::get('/adicionarproduto', function(){
    $prod = new \App\Produto();
    $prod->nome = "Meu novo produto";
    $prod->preco = "100.00";
    $prod->estoque = "10";
    $prod->categoria_id = 1;
    $prod->save();
    return $prod->toJson();
});

//ja vem os dados de categoria no json (associando categoria ao produto)
Route::get('/adicionarproduto2', function() {
    $cat = \App\Categoria::find(1);
    $prod = new \App\Produto();
    $prod->nome = "Meu novo produto";
    $prod->preco = "100.00";
    $prod->estoque = "10";
    $prod->categoria()->associate($cat);
    $prod->save();
    return $prod->toJson();
});

//desassociando produto da categoria
Route::get('/adicionarproduto3', function() {
   $p = \App\Produto::find(3);
   if(isset($p)){
      $p->categoria()->associate(\App\Categoria::find(1));
      $p->save();
      return $p->toJson();
   }
});


