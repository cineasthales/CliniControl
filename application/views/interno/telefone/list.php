<h1>Telefones</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/telefone/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Número</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($telefones as $telefone) { ?>
                <tr>
                    <td> <?= $telefone->id ?> </td>  
                    <td> <?php
                        if (strlen($telefone->numero) == 11) {
                            echo '(' . substr($telefone->numero, 0, 2) . ') ' . substr($telefone->numero, 2, 5)
                            . '-' . substr($telefone->numero, 7) . '<br>';
                        } else {
                            echo '(' . substr($telefone->numero, 0, 2) . ') ' . substr($telefone->numero, 2, 4)
                            . '-' . substr($telefone->numero, 6) . '<br>';
                        }
                        ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/telefone/atualizar/' . $telefone->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <?php if ($this->session->logado_admin_sis) { ?>
                            <span id="btexcluir"><a href="<?= base_url('interno/telefone/excluir/' . $telefone->id) ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir telefone de código <?= $telefone->id ?>?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                            </span>
                        <?php } ?>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>