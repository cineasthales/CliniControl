<h1>Vínculos Usuários e Telefones</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/usuario_telefone/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código Usuário</th>
                <th>Código Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($usuarios_telefones as $usuario_telefone) { ?>
                <tr>
                    <td> <?= $usuario_telefone->idUsuario ?> </td>  
                    <td> <?= $usuario_telefone->idTelefone ?> </td>
                    <td>
                        <span id="btexcluir"><a href="<?= base_url('interno/usuario_telefone/excluir/' . $usuario_telefone->idUsuario . '/' . $usuario_telefone->idTelefone) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir vínculo de códigos <?= $usuario_telefone->idUsuario ?> e <?= $usuario_telefone->idTelefone ?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>