<h1>Novo Adicional</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/adicional/grava_inclusao') ?>">
        <div>
            <label for="descricao">Descrição</label><br>
            <input type="text" id="descricao" name="descricao" required><br><br>
        </div>
        <div>
            <label for="valor">Valor</label><br>
            <input type="text" id="valor" name="valor" required><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>