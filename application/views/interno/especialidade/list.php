<h1>Especialidades</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/especialidade/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
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
            <?php foreach ($especialidades as $especialidade) { ?>
                <tr>
                    <td> <?= $especialidade->id ?> </td>  
                    <td> <?= $especialidade->descricao ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/especialidade/atualizar/' . $especialidade->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <span id="btexcluir"><a href="<?= base_url('interno/especialidade/excluir/' . $especialidade->id) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir especialidade de código <?= $especialidade->id?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
