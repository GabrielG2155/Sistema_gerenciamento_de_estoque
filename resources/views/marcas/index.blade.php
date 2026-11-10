{{-- Reutiliza o layout do projeto em resources/views/layouts/app.blade.php. --}}
<x-layouts::app title="Marcas">
    <section lang="pt-BR" class="mx-auto w-full max-w-4xl space-y-6">
        <h1 class="text-2xl font-semibold">Marcas</h1>

        {{-- A mensagem de sucesso aparece após cadastrar, editar ou excluir. --}}
        @if (session('sucesso'))
            <p role="status" class="rounded-lg border border-green-600 p-4 text-green-700 dark:text-green-400">
                {{ session('sucesso') }}
            </p>
        @endif

        <flux:button :href="route('marcas.create')" variant="primary">Nova Marca</flux:button>
        @if (session('erro'))
            <p role="alert" class="rounded-lg border border-red-600 p-4 text-red-600 dark:text-red-400">
                {{ session('erro') }}
            </p>
        @endif

        <div class="overflow-x-auto rounded-lg border border-zinc-200 dark:border-zinc-700">
            <table class="w-full text-left text-sm">
                <caption class="sr-only">Lista de marcas cadastradas</caption>
                <thead class="bg-zinc-100 dark:bg-zinc-900">
                    <tr>
                        <th scope="col" class="p-4">Código</th>
                        <th scope="col" class="p-4">Nome</th>
                        <th scope="col" class="p-4">Descrição</th>
                        <th scope="col" class="p-4">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- O forelse também trata o caso de a tabela estar vazia. --}}
                    @forelse ($marcas as $marca)
                        <tr class="border-t border-zinc-200 dark:border-zinc-700">
                            <td class="p-4">{{ $marca->id }}</td>
                            <td class="max-w-xs break-words p-4">{{ $marca->nome }}</td>
                            <td class="max-w-sm break-words p-4">{{ $marca->descricao ?? 'Sem descrição' }}</td>
                            <td class="p-4">
                                <div class="flex flex-wrap items-center gap-3">
                                    <a class="underline" href="{{ route('marcas.show', $marca) }}">Ver</a>
                                    <a class="underline" href="{{ route('marcas.edit', $marca) }}">Editar</a>
                                    {{-- DELETE indica a exclusão; @csrf protege o envio do formulário. --}}
                                    <form action="{{ route('marcas.destroy', $marca) }}" method="POST" onsubmit="return confirm('Deseja excluir esta marca?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cursor-pointer text-red-600 underline dark:text-red-400">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-6 text-center">Nenhuma marca cadastrada.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-layouts::app>
