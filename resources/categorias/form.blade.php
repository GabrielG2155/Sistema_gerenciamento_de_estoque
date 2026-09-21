@csrf

<flux:input name="nome" :value="old('nome', $categoria->nome ?? '')" />

<flux:textarea name="descricao">
    {{ old('descricao', $categoria->descricao ?? '') }}
</flux:textarea>

<flux:button type="submit">Salvar</flux:button>