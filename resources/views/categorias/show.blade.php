<x-layouts::app title="Detalhes da categoria">
    <section class="mx-auto w-full max-w-4xl space-y-6">
        <p>Código: {{ $categoria->id }}</p>
        <p>Nome: {{ $categoria->nome }}</p>
        <p>{{ $categoria->descricao ?? 'Sem descrição' }}</p>

        <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>
    </section>
</x-layouts::app>