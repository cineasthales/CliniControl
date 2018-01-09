<h1>Telefones de Locais</h1>
<span id="btcadastrar"><a href="<?= base_url('interno/telefoneLocal/incluir') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a></span>
<div id="divTable">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Número</th>
                <th>Código Local</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($telefonesLocais as $telefoneLocal) { ?>
                <tr>
                    <td> <?= $telefoneLocal->id ?> </td>  
                    <td> <?php
                        if (strlen($telefoneLocal->numero) == 11) {
                            echo '(' . substr($telefoneLocal->numero, 0, 2) . ') ' . substr($telefoneLocal->numero, 2, 5)
                            . '-' . substr($telefoneLocal->numero, 7) . '<br>';
                        } else {
                            echo '(' . substr($telefoneLocal->numero, 0, 2) . ') ' . substr($telefoneLocal->numero, 2, 4)
                            . '-' . substr($telefoneLocal->numero, 6) . '<br>';
                        }
                        ?></td>
                    <td> <?= $telefoneLocal->idLocal ?> </td>
                    <td>                        
                        <span id="btatualizar"><a href="<?= base_url('interno/telefoneLocal/atualizar/' . $telefoneLocal->id) ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Atualizar</a>
                        </span><br>
                        <?php if ($this->session->logado_admin_sis) { ?>
                            <span id="btexcluir"><a href="<?= base_url('interno/telefoneLocal/excluir/' . $telefoneLocal->id) ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir telefone de local de código <?= $telefoneLocal->id ?>?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                            </span>
                        <?php } ?>
                    </td>
                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>
