<h1>Novo Administrador</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/administrador/grava_inclusao/') ?>">        
        <div>
            <label for="idEmpresa">Empresa</label><br>
            <select id="idEmpresa" name="idEmpresa">
                <option value=""></option>
                <?php foreach ($empresas as $empresa) { ?>
                    <option value="<?= $empresa->id ?>">
                        #<?= $empresa->id ?> - <?= $empresa->razaoSocial ?></option>
                <?php } ?>
            </select><br><br>
        </div>      
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
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>