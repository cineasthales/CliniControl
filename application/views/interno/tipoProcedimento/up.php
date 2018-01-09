<h1>Atualizar Tipo de Procedimento</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/tipoProcedimento/grava_atualizacao/') . $tipoProcedimento->id ?>">
        <div>
            <label for="descricao">Descrição</label><br>
            <input type="text" id="descricao" name="descricao" value="<?= $tipoProcedimento->descricao ?>" required><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>