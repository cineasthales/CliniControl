<h1>Atualizar Especialidade</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/especialidade/grava_atualizacao/') . $especialidade->id ?>">
        <div>
            <label for="descricao">Descrição</label><br>
            <input type="text" id="descricao" name="descricao" value="<?= $especialidade->descricao ?>" required><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>