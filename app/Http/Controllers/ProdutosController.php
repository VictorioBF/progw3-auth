<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    //C
    public function create()
    {
        return view('produtos.create', ['pagina' => 'produtos']);
    }

    public function insert(Request $form)
    {
        $imagemCaminho = $form->file('imagem')->store('', 'imagens');
        
        $prod = new Produto();

        $prod->nome = $form->nome;
        $prod->preco = $form->preco;
        $prod->descricao = $form->descricao;
        $prod->image = $imagemCaminho;

        $prod->save();

        return redirect()->route('produtos.crop', ['prod' => $prod]);
    }
    //R
    public function index()
    {
        $produtos = Produto::orderBy('id', 'desc')->get();

        return view('produtos.index', ['prods' => $produtos, 'pagina' => 'produtos']);
    }

    public function show(Produto $prod)
    {
        return view('produtos.show', ['prod' => $prod, 'pagina' => 'produtos']);
    }
    //U
    public function edit(Produto $prod)
    {
        return view('produtos.edit', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function update(Request $form, Produto $prod)
    {
        $prod->nome = $form->nome;
        $prod->preco = $form->preco;
        $prod->descricao = $form->descricao;

        $prod->save();

        return redirect()->route('produtos');
    }
    //D
    public function remove(Produto $prod)
    {
        return view('produtos.remove', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function delete(Produto $prod)
    {
        $prod->delete();

        return redirect()->route('produtos');
    }
    //IMAGEM
    public function crop(Produto $prod)
    {
        return view('produtos.image', ['prod' => $prod, 'pagina' => 'image']);
    }
    public function image(Request $form, Produto $prod)
    {
        
        
        return view('produtos.image', ['prod' => $prod, 'pagina' => 'image']);
    }

}
