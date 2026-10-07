@csrf

<flux:input name="nome" :value="old('nome', $marca->nome ?? '')" />

<flux:textarea name="descricao">
    {{ old('descricao', $marca->descricao ?? '') }}
</flux:textarea>

<flux:button type="submit">Salvar</flux:button>