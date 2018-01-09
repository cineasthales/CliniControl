<h1>Atualizar Convênio</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/convenio/grava_atualizacao/') . $convenio->id ?>">
        <div>
            <label for="nome">Nome</label><br>
            <input type="text" id="nome" name="nome" value="<?= $convenio->nome ?>" required><br><br>
        </div>
        <div>
            <label for="CNPJ">CNPJ</label><br>
            <input type="text" id="cnpj" name="cnpj" value="<?= $convenio->cnpj ?>" required><br><br>
        </div>
        <div>
            <label for="ativo">Ativo</label><br>
            <?php if ($convenio->ativo == 1) { ?>
                <input type="radio" name="ativo" id="ativo1" value="1" checked> Sim<br>
                <input type="radio" name="ativo" id="ativo0" value="0"> Não<br><br>            
            <?php } else { ?>
                <input type="radio" name="ativo" id="ativo1" value="1"> Sim<br>
                <input type="radio" name="ativo" id="ativo0" value="0" checked> Não<br><br>
            <?php } ?>            
        </div> 
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>