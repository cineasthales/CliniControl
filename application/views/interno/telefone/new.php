<h1>Novo Telefone</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/telefone/grava_inclusao') ?>">
        <div>
            <label for="numero">Número</label><br>
            <input type="text" id="numero" name="numero" required><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>