<h1>Atualizar Local</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/local/grava_atualizacao/') . $local->id ?>">
        <div>
            <label for="descricao">Descrição</label><br>
            <input type="text" id="descricao" name="descricao" value="<?= $local->descricao ?>" required><br><br>
        </div>
        <div>
            <label for="ativo">Ativo</label><br>
            <?php if ($local->ativo == 1) { ?>
                <input type="radio" name="ativo" id="ativo1" value="1" checked> Sim<br>
                <input type="radio" name="ativo" id="ativo0" value="0"> Não<br><br>           
            <?php } else { ?>
                <input type="radio" name="ativo" id="ativo1" value="1"> Sim<br>
                <input type="radio" name="ativo" id="ativo0" value="0" checked> Não<br><br>
            <?php } ?>            
        </div>
        <div>
            <label for="idEmpresa">Empresa</label><br>
            <select id="idEmpresa" name="idEmpresa">
                <?php foreach ($empresas as $empresa) { ?>
                    <?php if ($empresa->id == $local->idEmpresa) { ?>
                        <option selected value="<?= $empresa->id ?>">
                            #<?= $empresa->id ?> - <?= $empresa->razaoSocial ?></option>
                    <?php } else { ?>
                        <option value="<?= $empresa->id ?>">
                            #<?= $empresa->id ?> - <?= $empresa->razaoSocial ?></option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idEndereco">Endereço</label><br>
            <select id="idEndereco" name="idEndereco">
                <?php foreach ($enderecos as $endereco) { ?>
                    <?php if ($endereco->id == $local->idEndereco) { ?>
                        <option selected value="<?= $endereco->id ?>">
                            #<?= $endereco->id ?> - <?= $endereco->logradouro ?>, <?= $endereco->numero ?> -
                            <?php if ($endereco->complemento != "") { ?>
                                <?= $endereco->complemento ?> - 
                            <?php } ?>
                            <?= $endereco->cidade ?>/<?= $endereco->estado ?>
                        </option>
                    <?php } else { ?>
                        <option value="<?= $endereco->id ?>">
                            #<?= $endereco->id ?> - <?= $endereco->logradouro ?>, <?= $endereco->numero ?> -
                            <?php if ($endereco->complemento != "") { ?>
                                <?= $endereco->complemento ?> - 
                            <?php } ?>
                            <?= $endereco->cidade ?>/<?= $endereco->estado ?>
                        </option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>