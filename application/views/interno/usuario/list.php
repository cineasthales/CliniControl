<h1>Usuários</h1>
<?php
// se houver uma variável de sessão definida irá exibir a mensagem
if ($this->session->has_userdata('mensagem')) {
    // obtém os valores atribuídos às variáveis de sessão
    $mensagem = $this->session->flashdata('mensagem');
    $tipo = $this->session->flashdata('tipo');
    // if ($tipo==1)
    if ($tipo) {
        echo "<div class='alerta_sucesso'>";
        echo $mensagem . "</div><br>";
    } else {
        echo "<div class='alerta_erro'>";
        echo "<strong>Erro. </strong>" . $mensagem . "</div><br>";
    }
}
?>
<span id="btcadastrar"><a href="<?= base_url('interno/usuario/incluir/') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>E-mail</th>
                <th>Nome de Usuário</th>
                <th>Nível</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Ativo</th>
                <th>Código Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php
            foreach ($usuarios as $usuario) {
                if ($usuario->nivel < $this->session->userdata('nivel') ||
                        $this->session->userdata('id') == $usuario->id) {
                    ?>                    
                    <tr>
                        <td> <?= $usuario->id ?> </td>  
                        <td> <?= $usuario->email ?> </td>  
                        <td> <?= $usuario->nomeUsuario ?> </td>
                        <td>
                            <?php
                            if ($usuario->nivel == 3) {
                                echo 'Administrador de Sistema';
                            } else if ($usuario->nivel == 2) {
                                echo 'Administrador de Empresa';
                            } else if ($usuario->nivel == 1) {
                                echo 'Empregado';
                            } else {
                                echo 'Paciente';
                            }
                            ?>
                        </td>
                        <td> <?= $usuario->nome ?> </td>
                        <td> <?= $usuario->sobrenome ?> </td>
                        <td> <?=
                            substr($usuario->cpf, 0, 3) . '.' . substr($usuario->cpf, 3, 3) . '.'
                            . substr($usuario->cpf, 6, 3) . '-' . substr($usuario->cpf, 9, 2)
                            ?></td>
                        <td> <?= date_format(date_create($usuario->dataNasc), 'd/m/Y') ?></td>
                        <td> <?php
                            if ($usuario->ativo == TRUE) {
                                echo "Sim";
                            } else {
                                echo "Não";
                            }
                            ?> </td>
                        <td> <?= $usuario->idEndereco ?> </td>
                        <td>                        
                            <span id="btatualizar"><a href="<?= base_url('interno/usuario/atualizar/' . $usuario->id) ?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                            </span><br>
        <?php if ($this->session->logado_admin_sis) { ?>
                                <span id="btexcluir"><a href="<?= base_url('interno/usuario/excluir/' . $usuario->id) ?>"
                                                        onclick="return confirm('Tem certeza que deseja excluir usuário de código <?= $usuario->id ?>?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                                </span>
        <?php } ?>
                        </td>
                    </tr>    
                <?php } ?>
<?php } ?>
        </tbody>
    </table>
</div>
