<h1>Administradores</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/administrador/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código Empresa</th>
                <th>Código Empregado</th>                
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($administradores as $administrador) { ?>
                <tr>
                    <td> <?= $administrador->idEmpresa ?> </td>
                    <td> <?= $administrador->idEmpregado ?> </td>                    
                    <td>
                        <span id="btexcluir"><a href="<?= base_url('interno/administrador/excluir/' . $administrador->idEmpresa . '/' . $administrador->idEmpregado) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir vínculo de códigos <?= $administrador->idEmpresa?> e <?= $administrador->idEmpregado?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>