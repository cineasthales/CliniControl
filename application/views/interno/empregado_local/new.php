<h1>Vincular Empregado e Local</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/empregado_local/grava_inclusao') ?>">
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
            <label for="idLocal">Local</label><br>
            <select id="idLocal" name="idLocal">
                <option value=""></option>
                <?php foreach ($locais as $local) { ?>
                    <option value="<?= $local->id ?>">
                        #<?= $local->id ?> - <?= $local->descricao ?></option>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>