<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FornecedorController extends Controller
{
    public function index(Request $request)
    {
        $query = Fornecedor::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%{$search}%")
                ->orWhere('cnpj', 'like', "%{$search}%")
                ->orWhere('telefone', 'like', "%{$search}%");
            });
        }

        $fornecedores = $query->latest()->get();

        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome'     => 'required|string|max:100',
            'cnpj'     => 'required|string|max:18|unique:fornecedores,cnpj',
            'email'    => 'required|email|max:100',
            'telefone' => 'required|string|max:20',
        ]);

        Fornecedor::create($dadosValidados);

        return redirect()
            ->route('fornecedores.index')
            ->with('sucesso', 'Fornecedor cadastrado com sucesso!');
    }

    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedores.show', compact('fornecedor'));
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedores.edit', compact('fornecedor'));
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $dadosValidados = $request->validate([
            'nome'     => 'required|string|max:100',
            'cnpj'     => ['required', 'string', 'max:18', Rule::unique('fornecedores')->ignore($fornecedor->id)],
            'email'    => 'required|email|max:100',
            'telefone' => 'required|string|max:20',
        ]);

        $fornecedor->update($dadosValidados);

        return redirect()
            ->route('fornecedores.index')
            ->with('sucesso', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()
            ->route('fornecedores.index')
            ->with('sucesso', 'Fornecedor excluído com sucesso!');
    }
}