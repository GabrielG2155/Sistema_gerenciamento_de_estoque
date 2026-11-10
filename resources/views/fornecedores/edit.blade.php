<x-layouts::app title="Editar marca">
    <section lang="pt-BR" class="mx-auto w-full max-w-4xl space-y-6">
        <h1 class="text-2xl font-semibold">Editar Fornecedor</h1>

        <form action="{{ route('fornecedores.update', $fornecedor) }}" method="POST" class="space-y-4">
            @method('PUT')
            @include('fornecedores.form')
        </form>
    </section>
</x-layouts::app>