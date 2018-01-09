<h1>Novo Endereço</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/endereco/grava_inclusao') ?>">
        <div>
            <label for="CEP">CEP</label><br>
            <input type="text" id="CEP" name="CEP" required><br><br>
        </div>
        <div>
            <label for="logradouro">Logradouro</label><br>
            <input type="text" id="logradouro" name="logradouro" required><br><br>
        </div>
        <div>
            <label for="numero">Número</label><br>
            <input type="text" id="numero" name="numero" required><br><br>
        </div>
        <div>
            <label for="complemento">Complemento</label><br>
            <input type="text" id="complemento" name="complemento"><br><br>
        </div>
        <div>
            <label for="cidade">Cidade</label><br>
            <input type="text" id="cidade" name="cidade" required><br><br>
        </div>
        <div>
            <label for="estado">Estado</label><br>
            <input type="text" id="estado" name="estado" required><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>