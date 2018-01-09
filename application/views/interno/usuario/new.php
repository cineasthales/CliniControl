<h1>Novo Usuário</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/usuario/grava_inclusao') ?>">
        <div>
            <label for="email">E-mail</label><br>
            <input type="text" id="email" name="email" required><br><br>
        </div>
        <div>
            <label for="nomeusuario">Nome de Usuário</label><br>
            <input type="text" id="nomeusuario" name="nomeusuario" required><br><br>
        </div>
        <div>
            <label for="senha">Senha</label><br>
            <input type="password" id="senha" name="senha" required><br><br>
        </div>
        <div>
            <label for="nivel">Nível</label><br>
            <select id="nivel" name="nivel" required>
                <option value=""></option>
                <option value="0">Paciente</option>
                <option value="1">Empregado</option>
                <option value="2">Administrador de Empresa</option>
                <option value="3">Administrador de Sistema</option>
            </select>
            <br><br>
        </div>
        <div>
            <label for="nome">Nome</label><br>
            <input type="text" id="nome" name="nome" required><br><br>
        </div>
        <div>
            <label for="sobrenome">Sobrenome</label><br>
            <input type="text" id="sobrenome" name="sobrenome" required><br><br>
        </div>
        <div>
            <label for="CPF">CPF</label><br>
            <input type="text" id="CPF" name="CPF" required><br><br>
        </div>
        <div>
            <label for="dataNasc">Data de Nascimento</label><br>
            <input type="date" id="dataNasc" name="dataNasc" required><br><br>
        </div>
        <div>
            <label for="ativo">Ativo</label><br>
            <input type="radio" name="ativo" id="ativo1" value="1" checked> Sim<br>
            <input type="radio" name="ativo" id="ativo0" value="0"> Não<br><br>
        </div>
        <div>
            <label for="idEndereco">Endereço</label><br>
            <select id="idEndereco" name="idEndereco">
                <option value=""></option>
                <?php foreach ($enderecos as $endereco) { ?>
                    <option value="<?= $endereco->id ?>">
                        #<?= $endereco->id ?> - <?= $endereco->logradouro ?>, <?= $endereco->numero ?> -
                        <?php if ($endereco->complemento != "") { ?>
                            <?= $endereco->complemento ?> - 
                        <?php } ?>
                        <?= $endereco->cidade ?>/<?= $endereco->estado ?>
                    </option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>