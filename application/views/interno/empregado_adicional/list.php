<h1>Vínculos Empregados e Adicionais</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/empregado_adicional/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código Empregado</th>
                <th>Código Adicional</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($empregados_adicionais as $empregado_adicional) { ?>
                <tr>
                    <td> <?= $empregado_adicional->idEmpregado ?> </td>  
                    <td> <?= $empregado_adicional->idAdicional ?> </td>  
                    <td>
                        <span id="btexcluir"><a href="<?= base_url('interno/empregado_adicional/excluir/' . $empregado_adicional->idEmpregado . '/' . $empregado_adicional->idAdicional) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir vínculo de códigos <?= $empregado_adicional->idEmpregado?> e <?= $empregado_adicional->idAdicional?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
