<x-layouts::app title="Detalhes do produto">
    <section class="mx-auto w-full max-w-4xl space-y-6">
        <h1 class="text-2xl font-semibold">Detalhes do Produto</h1>

        <div class="space-y-4 rounded-lg border border-zinc-200 p-6 dark:border-zinc-700">
            <p><span class="font-semibold">Código:</span> {{ $produto->id }}</p>
            <p><span class="font-semibold">Nome:</span> {{ $produto->nome }}</p>
            <p><span class="font-semibold">Preço:</span> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p><span class="font-semibold">Quantidade em Estoque:</span> {{ $produto->quantidade }}</p>
            <p><span class="font-semibold">Categoria:</span> {{ $produto->categoria->nome ?? 'Não informada' }}</p>
            <p><span class="font-semibold">Marca:</span> {{ $produto->marca->nome ?? 'Não informada' }}</p>
            <p><span class="font-semibold">Fornecedor:</span> {{ $produto->fornecedor->nome ?? 'Não informado' }}</p>
            <p><span class="font-semibold">Descrição:</span> {{ $produto->descricao ?? 'Sem descrição' }}</p>
        </div>

        <div class="flex items-center gap-4">
            <flux:button :href="route('produtos.edit', $produto)" variant="primary">Editar</flux:button>
            <a class="underline" href="{{ route('produtos.index') }}">Voltar</a>
        </div>
    </section>
</x-layouts::app>