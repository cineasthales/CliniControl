<h1>Procedimentos</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/procedimento/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>                
                <th>Código</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Descrição</th>
                <th>Receita</th>
                <th>Valor (R$)</th>
                <th>Realizado</th>
                <th>Código Tipo de Procedimento</th>
                <th>Código Paciente</th>
                <th>Código Profissional de Saúde</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($procedimentos as $procedimento) { ?>
                <tr>
                    <td> <?= $procedimento->id ?> </td>  
                    <td> <?= date_format(date_create($procedimento->data), 'd/m/Y') ?> </td>
                    <td> <?= $procedimento->hora ?> </td>
                    <td> <?= $procedimento->descricao ?> </td>
                    <td> <?php if ($procedimento->receita) { ?>
                            <a href="<?= base_url('receita/gerar/') . $procedimento->id ?>" target="_blank">
                                <?= $procedimento->receita ?> <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                            <?php } ?>
                    <td> <?= number_format($procedimento->valor, 2, ',', '.') ?> </td>
                    <td> <?php
                        if ($procedimento->realizado == TRUE) {
                            echo "Sim";
                        } else {
                            echo "Não";
                        }
                        ?> </td>
                    <td> <?= $procedimento->idTipoProcedimento ?> </td>
                    <td> <?= $procedimento->idPaciente ?> </td>
                    <td> <?= $procedimento->idProfissional ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/procedimento/atualizar/' . $procedimento->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <?php if ($this->session->logado_admin_sis) { ?>
                            <span id="btexcluir"><a href="<?= base_url('interno/procedimento/excluir/' . $procedimento->id) ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir procedimento de código <?= $procedimento->id ?>?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                            </span>
                        <?php } ?>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
