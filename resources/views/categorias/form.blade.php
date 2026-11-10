@csrf

<div class="grid grid-cols-1 gap-4">
    <div>
        <flux:input 
            name="nome" 
            label="Nome" 
            :value="old('nome', $categoria->nome ?? '')" 
            required 
            maxlength="100" 
        />
        @error('nome')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <flux:textarea 
            name="descricao" 
            label="Descrição (opcional)" 
            rows="4" 
            maxlength="1000"
        >{{ old('descricao', $categoria->descricao ?? '') }}</flux:textarea>
        @error('descricao')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex items-center gap-4 pt-2">
    <flux:button type="submit" variant="primary">Salvar</flux:button>
    <a class="text-sm underline" href="{{ route('categorias.index') }}">Cancelar</a>
</div>