<x-layouts::app title="Editar marca">
    <section lang="pt-BR" class="mx-auto w-full max-w-4xl space-y-6">
        <h1 class="text-2xl font-semibold">Editar marcas</h1>

        <form action="{{ route('marcas.update', $marca) }}" method="POST" class="space-y-4">
            @method('PUT')
            @include('marcas.form')
        </form>
    </section>
</x-layouts::app>