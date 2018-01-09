<h1>Empresas</h1>
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
<span id="btcadastrar"><a href="<?= base_url('interno/empresa/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($empresas as $empresa) { ?>
                <tr>
                    <td> <?= $empresa->id ?> </td>  
                    <td> <?= $empresa->razaoSocial ?> </td>
                    <td> <?= $empresa->nomeFantasia ?> </td>
                    <td> <?=
                        substr($empresa->cnpj, 0, 2) . '.' . substr($empresa->cnpj, 2, 3) . '.' .
                        substr($empresa->cnpj, 5, 3) . '/' . substr($empresa->cnpj, 8, 4) . '-' .
                        substr($empresa->cnpj, 12, 2);
                        ?> </td>
                    <td> <?php
                        if ($empresa->ativo == TRUE) {
                            echo "Sim";
                        } else {
                            echo "Não";
                        }
                        ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/empresa/atualizar/' . $empresa->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <?php if ($this->session->logado_admin_sis) { ?>
                            <span id="btexcluir"><a href="<?= base_url('interno/empresa/excluir/' . $empresa->id) ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir empresa de código <?= $empresa->id ?>?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                            </span>
                        <?php } ?>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
