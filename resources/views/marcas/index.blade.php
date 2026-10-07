<x-layouts::app title="Lista de marcas">
    <section class="mx-auto w-full max-w-4xl space-y-6">
        @if (session('sucesso'))
            <p class="text-green-600">{{ session('sucesso') }}</p>
        @endif

        <a href="{{ route('marcas.create') }}">Nova marca</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <td>{{ $marca->nome }}</td>
                        <td>{{ $marca->descricao ?? 'Sem descrição' }}</td>
                        <td>
                            <a href="{{ route('marcas.show', $marca) }}">Ver</a>
                            <a href="{{ route('marcas.edit', $marca) }}">Editar</a>

                            <form action="{{ route('marcas.destroy', $marca) }}" method="POST" onsubmit="return confirm('Tem a certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhuma marca cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>