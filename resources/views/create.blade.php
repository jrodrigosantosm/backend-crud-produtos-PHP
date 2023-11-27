<h1>Criar Novo Produto</h1>

<form action="{{ route('produto.novo') }}" method="post">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" required>

    <label for="valor">Valor:</label>
    <input type="number" name="valor" step="0.01" required>

    <label for="data_vencimento">Data de Vencimento:</label>
    <input type="date" name="data_vencimento" required>

    <label for="estoque">Estoque:</label>
    <input type="number" name="estoque" required>

    <label for="perecivel">Perecível:</label>
    <input type="checkbox" name="perecivel">

    <button type="submit">Salvar</button>
</form>
