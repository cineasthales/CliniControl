<h1>Atualizar Telefone</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/telefone/grava_atualizacao/') . $telefone->id ?>">
        <div>
            <label for="numero">Número</label><br>
            <input type="text" id="numero" name="numero" value="<?= $telefone->numero ?>" required><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>