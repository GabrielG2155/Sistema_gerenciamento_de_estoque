<form 
    action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" 
    method="POST" 
    class="space-y-6"
>
    @csrf

    @isset($produto)
        @method('PUT')
    @endisset

    {{-- Nome do Produto --}}
    <div>
        <flux:input 
            name="nome" 
            label="Nome" 
            :value="old('nome', $produto->nome ?? '')" 
            required 
            maxlength="100" 
        />
        @error('nome')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Preço --}}
        <div>
            <flux:input 
                type="number" 
                step="0.01" 
                min="0" 
                name="preco" 
                label="Preço (R$)" 
                :value="old('preco', $produto->preco ?? '')" 
                required 
            />
            @error('preco')
                <p role="alert" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Quantidade em Estoque --}}
        <div>
            <flux:input 
                type="number" 
                min="0" 
                name="quantidade" 
                label="Quantidade" 
                :value="old('quantidade', $produto->quantidade ?? 0)" 
                required 
            />
            @error('quantidade')
                <p role="alert" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Categoria --}}
    <div>
        <flux:select name="categoria_id" label="Categoria" required>
            <option value="">Selecione uma categoria...</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @selected(old('categoria_id', $produto->categoria_id ?? '') == $categoria->id)>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </flux:select>
        @error('categoria_id')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Marca --}}
    <div>
        <flux:select name="marca_id" label="Marca" required>
            <option value="">Selecione uma marca...</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" @selected(old('marca_id', $produto->marca_id ?? '') == $marca->id)>
                    {{ $marca->nome }}
                </option>
            @endforeach
        </flux:select>
        @error('marca_id')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Fornecedor --}}
    <div>
        <flux:select name="fornecedor_id" label="Fornecedor" required>
            <option value="">Selecione um fornecedor...</option>
            @foreach ($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}" @selected(old('fornecedor_id', $produto->fornecedor_id ?? '') == $fornecedor->id)>
                    {{ $fornecedor->nome }}
                </option>
            @endforeach
        </flux:select>
        @error('fornecedor_id')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Descrição --}}
    <div>
        <flux:textarea 
            name="descricao" 
            label="Descrição (opcional)" 
            rows="4" 
            maxlength="1000"
        >{{ old('descricao', $produto->descricao ?? '') }}</flux:textarea>
        @error('descricao')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Botões de Ação --}}
    <div class="flex items-center gap-4">
        <flux:button type="submit" variant="primary">Salvar</flux:button>
        <a class="underline" href="{{ route('produtos.index') }}">Cancelar</a>
    </div>
</form>