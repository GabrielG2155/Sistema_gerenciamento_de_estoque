@csrf

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div>
        <flux:input 
            name="nome" 
            label="Nome / Razão Social" 
            :value="old('nome', $fornecedor->nome ?? '')" 
            required 
            maxlength="100" 
        />
        @error('nome')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <flux:input 
            name="cnpj" 
            label="CNPJ" 
            :value="old('cnpj', $fornecedor->cnpj ?? '')" 
            required 
            maxlength="18" 
            placeholder="00.000.000/0000-00" 
        />
        @error('cnpj')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div>
        <flux:input 
            name="email" 
            type="email" 
            label="E-mail" 
            :value="old('email', $fornecedor->email ?? '')" 
            required 
            maxlength="100" 
        />
        @error('email')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <flux:input 
            name="telefone" 
            label="Telefone" 
            :value="old('telefone', $fornecedor->telefone ?? '')" 
            required 
            maxlength="20" 
            placeholder="(00) 00000-0000" 
        />
        @error('telefone')
            <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex items-center gap-4 pt-2">
    <flux:button type="submit" variant="primary">Salvar</flux:button>
    <a class="text-sm underline" href="{{ route('fornecedores.index') }}">Cancelar</a>
</div>