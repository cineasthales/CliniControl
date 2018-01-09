<h1>Novo Convênio</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/convenio/grava_inclusao') ?>">
        <div>
            <label for="nome">Nome</label><br>
            <input type="text" id="nome" name="nome" required><br><br>
        </div>
        <div>
            <label for="CNPJ">CNPJ</label><br>
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