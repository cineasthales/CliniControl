<h1>Atualizar Endereço</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/endereco/grava_atualizacao/') . $endereco->id ?>">
        <div>
            <label for="cep">CEP</label><br>
            <input type="text" id="cep" name="cep" value="<?= $endereco->cep ?>" required><br><br>
        </div>
        <div>
            <label for="logradouro">Logradouro</label><br>
            <input type="text" id="logradouro" name="logradouro" value="<?= $endereco->logradouro ?>" required><br><br>
        </div>
        <div>
            <label for="numero">Número</label><br>
            <input type="text" id="numero" name="numero" value="<?= $endereco->numero ?>" required><br><br>
        </div>
        <div>
            <label for="complemento">Complemento</label><br>
            <input type="text" id="complemento" name="complemento" value="<?= $endereco->complemento ?>"><br><br>
        </div>
        <div>
            <label for="cidade">Cidade</label><br>
            <input type="text" id="cidade" name="cidade" value="<?= $endereco->cidade ?>" required><br><br>
        </div>
        <div>
            <label for="estado">Estado</label><br>
            <input type="text" id="estado" name="estado" value="<?= $endereco->estado ?>" required><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>