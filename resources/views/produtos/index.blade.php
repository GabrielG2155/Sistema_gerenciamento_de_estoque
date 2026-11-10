{{-- Reutiliza o layout do projeto em resources/views/layouts/app.blade.php. --}}
<x-layouts::app title="Produtos">
    <section lang="pt-BR" class="mx-auto w-full max-w-6xl space-y-6">
        <h1 class="text-2xl font-semibold">Produtos</h1>

        {{-- A mensagem de sucesso aparece após cadastrar, editar ou excluir. --}}
        @if (session('sucesso'))
            <p role="status" class="rounded-lg border border-green-600 p-4 text-green-700 dark:text-green-400">
                {{ session('sucesso') }}
            </p>
        @endif

        @if (session('erro'))
            <p role="alert" class="rounded-lg border border-red-600 p-4 text-red-600 dark:text-red-400">
                {{ session('erro') }}
            </p>
        @endif

        <flux:button :href="route('produtos.create')" variant="primary">Novo Produto</flux:button>

        <form method="GET" action="{{ route('produtos.index') }}" class="flex items-center gap-2 mb-4">
        <div class="flex-1 max-w-sm">
        <flux:input 
            name="search" 
            placeholder="Pesquisar..." 
            icon="magnifying-glass"
            value="{{ request('search') }}" 
        />
        </div>
        <flux:button type="submit" variant="primary">Buscar</flux:button>
        @if(request('search'))
            <flux:button href="{{ route('produtos.index') }}" variant="subtle">Limpar</flux:button>
        @endif
    </form>

        <div class="overflow-x-auto rounded-lg border border-zinc-200 dark:border-zinc-700">
            <table class="w-full text-left text-sm">
                <caption class="sr-only">Lista de produtos cadastrados</caption>
                <thead class="bg-zinc-100 dark:bg-zinc-900">
                    <tr>
                        <th scope="col" class="p-4">Código</th>
                        <th scope="col" class="p-4">Nome</th>
                        <th scope="col" class="p-4">Preço</th>
                        <th scope="col" class="p-4">Quantidade</th>
                        <th scope="col" class="p-4">Categoria</th>
                        <th scope="col" class="p-4">Marca</th>
                        <th scope="col" class="p-4">Fornecedor</th>
                        <th scope="col" class="p-4">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- O forelse também trata o caso de a tabela estar vazia. --}}
                    @forelse ($produtos as $produto)
                        <tr class="border-t border-zinc-200 dark:border-zinc-700">
                            <td class="p-4">{{ $produto->id }}</td>
                            <td class="max-w-xs break-words p-4 font-medium">{{ $produto->nome }}</td>
                            <td class="p-4">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td class="p-4">{{ $produto->quantidade }}</td>
                            <td class="p-4">{{ $produto->categoria->nome ?? '-' }}</td>
                            <td class="p-4">{{ $produto->marca->nome ?? '-' }}</td>
                            <td class="p-4">{{ $produto->fornecedor->nome ?? '-' }}</td>
                            <td class="p-4">
                                <div class="flex flex-wrap items-center gap-3">
                                    <a class="underline" href="{{ route('produtos.show', $produto) }}">Ver</a>
                                    <a class="underline" href="{{ route('produtos.edit', $produto) }}">Editar</a>
                                    
                                    {{-- DELETE indica a exclusão; @csrf protege o envio do formulário. --}}
                                    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" onsubmit="return confirm('Deseja excluir este produto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cursor-pointer text-red-600 underline dark:text-red-400">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-6 text-center">Nenhum produto cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-layouts::app>