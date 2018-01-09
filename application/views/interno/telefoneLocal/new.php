<h1>Novo Telefone de Local</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/telefoneLocal/grava_inclusao') ?>">
        <div>
            <label for="numero">Número</label><br>
            <input type="text" id="numero" name="numero" required><br><br>
        </div>
        <div>
            <label for="idLocal">Local</label><br>
            <select id="idLocal" name="idLocal">
                <option value=""></option>
                <?php foreach ($locais as $local) { ?>
                    <option value="<?= $local->id ?>">
                        #<?= $local->id ?> - <?= $local->descricao ?></option>
                <?php } ?>
            </select><br><br>
        </div>                
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>