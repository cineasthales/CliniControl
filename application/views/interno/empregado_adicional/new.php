<h1>Vincular Empregado e Adicional</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/empregado_adicional/grava_inclusao') ?>">
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
            <label for="idAdicional">Adicional</label><br>
            <select id="idAdicional" name="idAdicional">
                <option value=""></option>
                <?php foreach ($adicionais as $adicional) { ?>
                    <option value="<?= $adicional->id ?>">
                        #<?= $adicional->id ?> - <?= $adicional->descricao ?> - R$ <?= $adicional->valor ?></option>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>