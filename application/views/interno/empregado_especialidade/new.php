<h1>Vincular Empregado e Especialidade</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/empregado_especialidade/grava_inclusao') ?>">
        <div>
            <label for="idEmpregado">Empregado</label><br>
            <select id="idEmpregado" name="idEmpregado">
                <option value=""></option>
                <?php foreach ($empregados as $empregado) { ?>
                    <option value="<?= $empregado->id ?>">
                        #<?= $empregado->id ?> - <?= $empregado->registro ?></option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idEspecialidade">Especialidade</label><br>
            <select id="idEspecialidade" name="idEspecialidade">
                <option value=""></option>
                <?php foreach ($especialidades as $especialidade) { ?>
                    <option value="<?= $especialidade->id ?>">
                        #<?= $especialidade->id ?> - <?= $especialidade->descricao ?></option>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>