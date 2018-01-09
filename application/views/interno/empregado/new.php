<h1>Novo Empregado</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/empregado/grava_inclusao') ?>">
        <div>
            <label for="salario">Salário</label><br>
            <input type="text" id="salario" name="salario" required><br><br>
        </div>
        <div>
            <label for="registro">Registro</label><br>
            <input type="text" id="registro" name="registro"><br><br>
        </div>                
        <div>
            <label for="idCargo">Cargo</label><br>
            <select id="idCargo" name="idCargo">
                <option value=""></option>
                <?php foreach ($cargos as $cargo) { ?>
                    <option value="<?= $cargo->id ?>">
                        #<?= $cargo->id ?> - <?= $cargo->descricao ?></option>
                <?php } ?>
            </select><br><br>
        </div>                
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
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>