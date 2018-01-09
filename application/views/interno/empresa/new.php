<h1>Nova Empresa</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/empresa/grava_inclusao') ?>">
        <div>
            <label for="razaoSocial">Razão Social</label><br>
            <input type="text" id="razaoSocial" name="razaoSocial" required><br><br>
        </div>
        <div>
            <label for="nomeFantasia">Nome Fantasia</label><br>
            <input type="text" id="nomeFantasia" name="nomeFantasia" required><br><br>
        </div>                
        <div>
            <label for="cnpj">CNPJ</label><br>
            <input type="text" id="cnpj" name="cnpj" required><br><br>
        </div>                
        <div>
            <label for="ativo">Ativo</label><br>
            <input type="radio" name="ativo" id="ativo1" value="1" checked> Sim<br>
            <input type="radio" name="ativo" id="ativo0" value="0"> Não<br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>