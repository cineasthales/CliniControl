<h1>Empregados</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/empregado/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Salário (R$)</th>
                <th>Registro</th>
                <th>Código Cargo</th>
                <th>Código Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($empregados as $empregado) { ?>
                <tr>
                    <td> <?= $empregado->id ?> </td>  
                    <td> <?= number_format($empregado->salario, 2, ',', '.') ?> </td>
                    <td> <?= $empregado->registro ?> </td>
                    <td> <?= $empregado->idCargo ?> </td>
                    <td> <?= $empregado->idUsuario ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/empregado/atualizar/' . $empregado->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <?php if ($this->session->logado_admin_sis) { ?>
                            <span id="btexcluir"><a href="<?= base_url('interno/empregado/excluir/' . $empregado->id) ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir empregado de código <?= $empregado->id ?>?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                            </span>
                        <?php } ?>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>