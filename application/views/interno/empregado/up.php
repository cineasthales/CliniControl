<h1>Atualizar Empregado</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/empregado/grava_atualizacao/') . $empregado->id ?>">
        <div>
            <label for="salario">Salário</label><br>
            <input type="text" id="salario" name="salario" value="<?= $empregado->salario ?>" required><br><br>
        </div>
        <div>
            <label for="registro">Registro</label><br>
            <input type="text" id="registro" name="registro" value="<?= $empregado->registro ?>"><br><br>
        </div>                
        <div>
            <label for="idCargo">Cargo</label><br>
            <select id="idCargo" name="idCargo">
                <option value=""></option>
                <?php foreach ($cargos as $cargo) { ?>
                    <?php if ($cargo->id == $empregado->idCargo) { ?>
                        <option selected value="<?= $cargo->id ?>">
                            #<?= $cargo->id ?> - <?= $cargo->descricao ?></option>
                    <?php } else { ?>
                        <option value="<?= $cargo->id ?>">
                            #<?= $cargo->id ?> - <?= $cargo->descricao ?></option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>
            <label for="idUsuario">Usuário</label><br>
            <select id="idUsuario" name="idUsuario">
                <option value=""></option>
                <?php foreach ($usuarios as $usuario) { ?>
                    <?php if ($usuario->id == $empregado->idUsuario) { ?>
                        <option selected value="<?= $usuario->id ?>">
                            #<?= $usuario->id ?> - <?= $usuario->nome ?> <?= $usuario->sobrenome ?></option>
                    <?php } else { ?>
                        <option value="<?= $usuario->id ?>">
                            #<?= $usuario->id ?> - <?= $usuario->nome ?> <?= $usuario->sobrenome ?></option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>