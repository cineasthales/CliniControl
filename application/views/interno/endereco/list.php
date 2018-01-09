<h1>Endereços</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/endereco/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($enderecos as $endereco) { ?>
                <tr>
                    <td> <?= $endereco->id ?> </td>  
                    <td> <?= substr($endereco->cep, 0, 2) . '.' . substr($endereco->cep, 2, 3) . '-'
            . substr($endereco->cep, 5, 3)
                ?></td>
                    <td> <?= $endereco->logradouro ?> </td>
                    <td> <?= $endereco->numero ?> </td>
                    <td> <?= $endereco->complemento ?> </td>
                    <td> <?= $endereco->cidade ?> </td>
                    <td> <?= $endereco->estado ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/endereco/atualizar/' . $endereco->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
    <?php if ($this->session->logado_admin_sis) { ?>
                            <span id="btexcluir"><a href="<?= base_url('interno/endereco/excluir/' . $endereco->id) ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir endereço de código <?= $endereco->id ?>?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                            </span>
    <?php } ?>
                    </td>
                </tr>    
<?php } ?>
        </tbody>
    </table>
</div>