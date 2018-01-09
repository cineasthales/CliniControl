<h1>Convênios</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/convenio/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>                
                <th>Código</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($convenios as $convenio) { ?>
                <tr>
                    <td> <?= $convenio->id ?> </td>  
                    <td> <?= $convenio->nome ?> </td>
                    <td> <?=
                        substr($convenio->cnpj, 0, 2) . '.' . substr($convenio->cnpj, 2, 3) . '.' .
                        substr($convenio->cnpj, 5, 3) . '/' . substr($convenio->cnpj, 8, 4) . '-' .
                        substr($convenio->cnpj, 12, 2);
                        ?> </td>
                    <td> <?php
                        if ($convenio->ativo == TRUE) {
                            echo "Sim";
                        } else {
                            echo "Não";
                        }
                        ?> </td>  
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/convenio/atualizar/' . $convenio->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <span id="btexcluir"><a href="<?= base_url('interno/convenio/excluir/' . $convenio->id) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir convênio de código <?= $convenio->id ?>?')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </span>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
