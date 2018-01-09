<h1>Atualizar Cargo</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/cargo/grava_atualizacao/') . $cargo->id ?>">
        <div>
            <label for="descricao">Descrição</label><br>
            <input type="text" id="descricao" name="descricao" value="<?= $cargo->descricao ?>" required><br><br>
        </div>
        <div>
            <label for="profissionalSaude">Profissional de Saúde</label><br>
            <?php if ($cargo->profissionalSaude == 1) { ?>
                <input type="radio" name="profissionalSaude" id="profissionalSaude1" value="1" checked> Sim<br>
                <input type="radio" name="profissionalSaude" id="profissionalSaude0" value="0"> Não<br><br>         
            <?php } else { ?>
                <input type="radio" name="profissionalSaude" id="profissionalSaude1" value="1"> Sim<br>
                <input type="radio" name="profissionalSaude" id="profissionalSaude0" value="0" checked> Não<br><br>
            <?php } ?>            
        </div>                
        <div>
            <label for="tipoRegistro">Tipo de Registro</label><br>
            <input type="text" id="tipoRegistro" name="tipoRegistro" value="<?= $cargo->tipoRegistro ?>"><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>