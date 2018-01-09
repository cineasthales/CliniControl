<h1>Vínculos Empregados e Locais</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/empregado_local/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código Empregado</th>
                <th>Código Local</th>                
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($empregados_locais as $empregado_local) { ?>
                <tr>
                    <td> <?= $empregado_local->idEmpregado ?> </td>
                    <td> <?= $empregado_local->idLocal ?> </td>                    
                    <td>
                        <span id="btexcluir"><a href="<?= base_url('interno/empregado_local/excluir/' . $empregado_local->idEmpregado . '/' . $empregado_local->idLocal) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir vínculo de códigos <?= $empregado_local->idEmpregado ?> e <?= $empregado_local->idLocal ?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
