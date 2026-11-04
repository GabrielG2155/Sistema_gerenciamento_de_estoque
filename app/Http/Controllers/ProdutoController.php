<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Exibe a listagem de produtos.
     */
    public function index()
    {
        $produtos = Produto::with(['categoria', 'marca', 'fornecedor'])->latest()->get();

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Exibe o formulário de criação de um novo produto.
     */
    public function create()
    {
        return view('produtos.create', [
            'categorias'   => Categoria::orderBy('nome')->get(),
            'marcas'       => Marca::orderBy('nome')->get(),
            'fornecedores' => Fornecedor::orderBy('nome')->get(),
        ]);
    }

    /**
     * Salva um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        $regrasValida = $request->validate([
            'nome'          => 'required|string|max:100',
            'preco'         => 'required|numeric|min:0',
            'quantidade'    => 'required|integer|min:0',
            'categoria_id'  => 'required|exists:categorias,id',
            'marca_id'      => 'required|exists:marcas,id',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'descricao'     => 'nullable|string|max:1000',
        ]);

        Produto::create($regrasValida);

        return redirect()
            ->route('produtos.index')
            ->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um produto específico.
     */
    public function show(Produto $produto)
    {
        $produto->load(['categoria', 'marca', 'fornecedor']);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Exibe o formulário de edição de um produto.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', [
            'produto'      => $produto,
            'categorias'   => Categoria::orderBy('nome')->get(),
            'marcas'       => Marca::orderBy('nome')->get(),
            'fornecedores' => Fornecedor::orderBy('nome')->get(),
        ]);
    }

    /**
     * Atualiza os dados do produto especificado.
     */
    public function update(Request $request, Produto $produto)
    {
        $regrasValida = $request->validate([
            'nome'          => 'required|string|max:100',
            'preco'         => 'required|numeric|min:0',
            'quantidade'    => 'required|integer|min:0',
            'categoria_id'  => 'required|exists:categorias,id',
            'marca_id'      => 'required|exists:marcas,id',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'descricao'     => 'nullable|string|max:1000',
        ]);

        $produto->update($regrasValida);

        return redirect()
            ->route('produtos.index')
            ->with('sucesso', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove o produto do banco de dados.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('sucesso', 'Produto excluído com sucesso!');
    }
}