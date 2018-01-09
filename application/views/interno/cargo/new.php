<h1>Novo Cargo</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/cargo/grava_inclusao') ?>">
        <div>
            <label for="descricao">Descrição</label><br>
            <input type="text" id="descricao" name="descricao" required><br><br>
        </div>
        <div>
            <label for="profissionalSaude">Profissional de Saúde</label><br>
            <input type="radio" name="profissionalSaude" id="profissionalSaude1" value="1"> Sim<br>
            <input type="radio" name="profissionalSaude" id="profissionalSaude0" value="0" checked> Não<br><br>
        </div>                
        <div>
            <label for="tipoRegistro">Tipo de Registro</label><br>
            <input type="text" id="tipoRegistro" name="tipoRegistro"><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>