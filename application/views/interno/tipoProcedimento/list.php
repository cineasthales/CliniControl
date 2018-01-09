<h1>Tipos de Procedimento</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/tipoProcedimento/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($tiposProcedimentos as $tipoProcedimento) { ?>
                <tr>
                    <td> <?= $tipoProcedimento->id ?> </td>  
                    <td> <?= $tipoProcedimento->descricao ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/tipoProcedimento/atualizar/' . $tipoProcedimento->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <span id="btexcluir"><a href="<?= base_url('interno/tipoProcedimento/excluir/' . $tipoProcedimento->id) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir tipo de procedimento de código <?= $tipoProcedimento->id?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>