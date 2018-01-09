<h1>Vincular Usuário e Convênio</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/usuario_convenio/grava_inclusao') ?>">
        <div>
            <label for="idUsuario">Usuário</label><br>
            <select id="idUsuario" name="idUsuario">
                <option value=""></option>
                <?php foreach ($usuarios as $usuario) { ?>
                    <option value="<?= $usuario->id ?>">
                        #<?= $usuario->id ?> - <?= $usuario->nome ?> <?= $usuario->sobrenome ?></option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idConvenio">Convênio</label><br>
            <select id="idConvenio" name="idConvenio">
                <option value=""></option>
                <?php foreach ($convenios as $convenio) { ?>
                    <option value="<?= $convenio->id ?>">
                        #<?= $convenio->id ?> - <?= $convenio->nome ?></option>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>