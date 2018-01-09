<h1>Vincular Usuário e Telefone</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/usuario_telefone/grava_inclusao') ?>">
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
            <label for="idTelefone">Telefone</label><br>
            <select id="idTelefone" name="idTelefone">
                <option value=""></option>
                <?php foreach ($telefones as $telefone) { ?>
                    <option value="<?= $telefone->id ?>">
                        #<?= $telefone->id ?> - <?= $telefone->numero ?></option>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>