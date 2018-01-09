<h1>Novo Local</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/local/grava_inclusao') ?>">
        <div>
            <label for="descricao">Descrição</label><br>
            <input type="text" id="descricao" name="descricao" required><br><br>
        </div>
        <div>
            <label for="ativo">Ativo</label><br>
            <input type="radio" name="ativo" id="ativo1" value="1" checked> Sim<br>
            <input type="radio" name="ativo" id="ativo0" value="0"> Não<br><br>
        </div>
        <div>
            <label for="idEmpresa">Empresa</label><br>
            <select id="idEmpresa" name="idEmpresa">
                <option value=""></option>
                <?php foreach ($empresas as $empresa) { ?>
                    <option value="<?= $empresa->id ?>">
                        #<?= $empresa->id ?> - <?= $empresa->razaoSocial ?></option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idEndereco">Endereço</label><br>
            <select id="idEndereco" name="idEndereco">
                <option value=""></option>
                <?php foreach ($enderecos as $endereco) { ?>
                    <option value="<?= $endereco->id ?>">
                        #<?= $endereco->id ?> - <?= $endereco->logradouro ?>, <?= $endereco->numero ?> -
                        <?php if ($endereco->complemento != "") { ?>
                            <?= $endereco->complemento ?> - 
                        <?php } ?>
                        <?= $endereco->cidade ?>/<?= $endereco->estado ?>
                    </option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>