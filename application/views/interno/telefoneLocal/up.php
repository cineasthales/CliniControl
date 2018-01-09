<h1>Atualizar Telefone de Local</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/telefoneLocal/grava_atualizacao/') . $telefoneLocal->id ?>">
        <div>
            <label for="numero">Número</label><br>
            <input type="text" id="numero" name="numero" value="<?= $telefoneLocal->numero ?>" required><br><br>
        </div>
        <div>
            <label for="idLocal">Local</label><br>
            <select id="idLocal" name="idLocal">
                <?php foreach ($locais as $local) { ?>
                    <?php if ($local->id == $telefoneLocal->idLocal) { ?>
                        <option selected value="<?= $local->id ?>">
                            #<?= $local->id ?> - <?= $local->descricao ?></option>
                    <?php } else { ?>
                        <option value="<?= $local->id ?>">
                            #<?= $local->id ?> - <?= $local->descricao ?></option>
                    <?php } ?>
                <?php } ?>  
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>