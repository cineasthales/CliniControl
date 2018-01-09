<h1>Vínculos Empregados e Especialidades</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/empregado_especialidade/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código Empregado</th>
                <th>Código Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($empregados_especialidades as $empregado_especialidade) { ?>
                <tr>
                    <td> <?= $empregado_especialidade->idEmpregado ?> </td>  
                    <td> <?= $empregado_especialidade->idEspecialidade ?> </td>  
                    <td>
                        <span id="btexcluir"><a href="<?= base_url('interno/empregado_especialidade/excluir/' . $empregado_especialidade->idEmpregado . '/' . $empregado_especialidade->idEspecialidade) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir vínculo de códigos <?= $empregado_especialidade->idEmpregado ?> e <?= $empregado_especialidade->idEspecialidade ?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
