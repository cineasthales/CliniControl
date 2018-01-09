<h1>Atualizar Empresa</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/empresa/grava_atualizacao/') . $empresa->id ?>">
        <div>
            <label for="razaoSocial">Razão Social</label><br>
            <input type="text" id="razaoSocial" name="razaoSocial" value="<?= $empresa->razaoSocial ?>" required><br><br>
        </div>
        <div>
            <label for="nomeFantasia">Nome Fantasia</label><br>
            <input type="text" id="nomeFantasia" name="nomeFantasia" value="<?= $empresa->nomeFantasia ?>" required><br><br>
        </div>                
        <div>
            <label for="cnpj">CNPJ</label><br>
            <input type="text" id="cnpj" name="cnpj" value="<?= $empresa->cnpj ?>" required><br><br>
        </div>                
        <div>
            <label for="ativo">Ativo</label><br>
            <?php if ($empresa->ativo == 1) { ?>
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