<h1>Vínculos Usuários e Convênios</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/usuario_convenio/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código Usuario</th>
                <th>Código Convênio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($usuarios_convenios as $usuario_convenio) { ?>
                <tr>
                    <td> <?= $usuario_convenio->idUsuario ?> </td>  
                    <td> <?= $usuario_convenio->idConvenio ?> </td>
                    <td>
                        <span id="btexcluir"><a href="<?= base_url('interno/usuario_convenio/excluir/' . $usuario_convenio->idUsuario . '/' . $usuario_convenio->idConvenio) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir vínculo de códigos <?= $usuario_convenio->idUsuario ?> e <?= $usuario_convenio->idConvenio ?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>