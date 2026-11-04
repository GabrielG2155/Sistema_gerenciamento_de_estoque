<x-layouts::app title="Editar marca">
    <section lang="pt-BR" class="mx-auto w-full max-w-4xl space-y-6">
        <h1 class="text-2xl font-semibold">Editar produtos</h1>

        <form action="{{ route('produtos.update', $produto) }}" method="POST" class="space-y-4">
            @method('PUT')
            @include('produtos.form')
        </form>
    </section>
</x-layouts::app>