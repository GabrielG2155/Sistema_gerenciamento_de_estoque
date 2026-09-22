<x-layouts::app title="Lista de categorias">
    <section class="mx-auto w-full max-w-4xl space-y-6">
        @if (session('sucesso'))
            <p class="text-green-600">{{ session('sucesso') }}</p>
        @endif

        <a href="{{ route('categorias.create') }}">Nova categoria</a>

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
                @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->descricao ?? 'Sem descrição' }}</td>
                        <td>
                            <a href="{{ route('categorias.show', $categoria) }}">Ver</a>
                            <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>

                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" onsubmit="return confirm('Tem a certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhuma categoria cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>