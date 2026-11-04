<x-layouts::app title="Detalhes do fornecedor">
    <section class="mx-auto w-full max-w-4xl space-y-6">
        <h1 class="text-2xl font-semibold">Detalhes do Fornecedor</h1>

        <div class="space-y-4 rounded-lg border border-zinc-200 p-6 dark:border-zinc-700">
            <p><span class="font-semibold">Código:</span> {{ $fornecedor->id }}</p>
            <p><span class="font-semibold">Nome:</span> {{ $fornecedor->nome }}</p>
            <p><span class="font-semibold">CNPJ:</span> {{ $fornecedor->cnpj }}</p>
            <p><span class="font-semibold">E-mail:</span> {{ $fornecedor->email }}</p>
            <p><span class="font-semibold">Telefone:</span> {{ $fornecedor->telefone }}</p>
        </div>

        <div class="flex items-center gap-4">
            <flux:button :href="route('fornecedores.edit', $fornecedor)" variant="primary">Editar</flux:button>
            <a class="underline" href="{{ route('fornecedores.index') }}">Voltar</a>
        </div>
    </section>
</x-layouts::app>