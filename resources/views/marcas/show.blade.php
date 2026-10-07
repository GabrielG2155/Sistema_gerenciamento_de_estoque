<x-layouts::app title="Detalhes da marca">
    <section class="mx-auto w-full max-w-4xl space-y-6">
        <p>Código: {{ $marca->id }}</p>
        <p>Nome: {{ $marca->nome }}</p>
        <p>{{ $marca->descricao ?? 'Sem descrição' }}</p>

        <a href="{{ route('marcas.edit', $marca) }}">Editar</a>
    </section>
</x-layouts::app>