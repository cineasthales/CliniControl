<h1>Locais</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/local/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Ativo</th>
                <th>Código Empresa</th>
                <th>Código Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($locais as $local) { ?>
                <tr>
                    <td> <?= $local->id ?> </td>  
                    <td> <?= $local->descricao ?> </td>
                    <td> <?php
                        if ($local->ativo == TRUE) {
                            echo "Sim";
                        } else {
                            echo "Não";
                        }
                        ?> </td>
                    <td> <?= $local->idEmpresa ?> </td>
                    <td> <?= $local->idEndereco ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/local/atualizar/' . $local->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <?php if ($this->session->logado_admin_sis) { ?>
                            <span id="btexcluir"><a href="<?= base_url('interno/local/excluir/' . $local->id) ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir local de código <?= $local->id ?>?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                            </span>
                        <?php } ?>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>