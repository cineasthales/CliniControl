<h1>Atualizar Usuário</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/usuario/grava_atualizacao/') . $usuario->id ?>">
        <div>
            <label for="email">E-mail</label><br>
            <input type="text" id="email" name="email" value="<?= $usuario->email ?>" required><br><br>
        </div>
        <div>
            <label for="nomeusuario">Nome de Usuário</label><br>
            <input type="text" id="nomeusuario" name="nomeusuario" value="<?= $usuario->nomeUsuario ?>" required><br><br>
        </div>
        <div>
            <label for="nivel">Nível</label><br>
            <select id="nivel" name="nivel" required>
                <?php
                if ($usuario->nivel == 0) {
                    echo '<option selected value="0">Paciente</option>';
                } else {
                    echo '<option value="0">Paciente</option>';
                }
                if ($usuario->nivel == 1) {
                    echo '<option selected value="1">Empregado</option>';
                } else {
                    echo '<option value="1">Empregado</option>';
                }
                if ($usuario->nivel == 2) {
                    echo '<option value="2">Administrador de Empresa</option>';
                } else {
                    echo '<option value="2">Administrador de Empresa</option>';
                }
                if ($usuario->nivel == 3) {
                    echo '<option value="3">Administrador de Sistema</option>';
                } else {
                    echo '<option value="3">Administrador de Sistema</option>';
                }
                ?>
            </select>
            <br><br>
            <input type="text" id="nivel" name="nivel" value="<?= $usuario->nivel ?>" required><br><br>
        </div>
        <div>
            <label for="nome">Nome</label><br>
            <input type="text" id="nome" name="nome" value="<?= $usuario->nome ?>" required><br><br>
        </div>
        <div>
            <label for="sobrenome">Sobrenome</label><br>
            <input type="text" id="sobrenome" name="sobrenome" value="<?= $usuario->sobrenome ?>" required><br><br>
        </div>
        <div>
            <label for="CPF">CPF</label><br>
            <input type="text" id="CPF" name="CPF" value="<?= $usuario->cpf ?>" required><br><br>
        </div>
        <div>
            <label for="dataNasc">Data de Nascimento</label><br>
            <input type="date" id="dataNasc" name="dataNasc" value="<?= $usuario->dataNasc ?>" required><br><br>
        </div>
        <div>
            <label for="ativo">Ativo</label><br>
            <?php if ($usuario->ativo == 1) { ?>
                <input type="radio" name="ativo" id="ativo1" value="1" checked> Sim<br>
                <input type="radio" name="ativo" id="ativo0" value="0"> Não<br><br>           
            <?php } else { ?>
                <input type="radio" name="ativo" id="ativo1" value="1"> Sim<br>
                <input type="radio" name="ativo" id="ativo0" value="0" checked> Não<br><br>
            <?php } ?>          
        </div>
        <div>
            <label for="idEndereco">Endereço</label><br>
            <select id="idEndereco" name="idEndereco">
                <?php foreach ($enderecos as $endereco) { ?>
                    <?php if ($endereco->id == $usuario->idEndereco) { ?>
                        <option selected value="<?= $endereco->id ?>">
                            #<?= $endereco->id ?> - <?= $endereco->logradouro ?>, <?= $endereco->numero ?> -
                            <?php if ($endereco->complemento != "") { ?>
                                <?= $endereco->complemento ?> - 
                            <?php } ?>
                            <?= $endereco->cidade ?>/<?= $endereco->estado ?>
                        </option>
                    <?php } else { ?>
                        <option value="<?= $endereco->id ?>">
                            #<?= $endereco->id ?> - <?= $endereco->logradouro ?>, <?= $endereco->numero ?> -
                            <?php if ($endereco->complemento != "") { ?>
                                <?= $endereco->complemento ?> - 
                            <?php } ?>
                            <?= $endereco->cidade ?>/<?= $endereco->estado ?>
                        </option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>