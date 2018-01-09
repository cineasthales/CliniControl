<h1>Atualizar Procedimento</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/procedimento/grava_atualizacao/') . $procedimento->id ?>">
        <div>
            <label for="data">Data</label><br>
            <input type="date" id="data" name="data" value="<?= $procedimento->data ?>" required><br><br>
        </div>
        <div>
            <label for="hora">Hora</label><br>
            <input type="text" id="hora" name="hora" value="<?= $procedimento->hora ?>" required><br><br>
        </div>
        <div>
            <label for="descricao">Descrição</label><br>
            <textarea rows="10" cols="50" maxlength="500" id="descricao" name="descricao"><?= $procedimento->descricao ?></textarea><br><br>
        </div>
        <div>
            <label for="receita">Receita</label><br>
            <textarea rows="10" cols="50" maxlength="500" id="receita" name="receita"><?= $procedimento->receita ?></textarea><br><br>
        </div>
        <div>
            <label for="valor">Valor</label><br>
            <input type="text" id="valor" name="valor" value="<?= $procedimento->valor ?>" required><br><br>
        </div>
        <div>
            <label for="realizado">Realizado</label><br>
            <?php if ($procedimento->realizado == 1) { ?>
                <input type="radio" name="realizado" id="realizado1" value="1" checked> Sim<br>
                <input type="radio" name="realizado" id="realizado0" value="0"> Não<br><br>          
            <?php } else { ?>
                <input type="radio" name="realizado" id="realizado1" value="1"> Sim<br>
                <input type="radio" name="realizado" id="realizado0" value="0" checked> Não<br><br>
            <?php } ?>            
        </div>        
        <div>
            <label for="idTipoProcedimento">Tipo de Procedimento</label><br>
            <select id="idTipoProcedimento" name="idTipoProcedimento">
                <option value=""></option>
                <?php foreach ($tiposProcedimento as $tipoProcedimento) { ?>
                    <?php if ($tipoProcedimento->id == $procedimento->idTipoProcedimento) { ?>
                        <option selected value="<?= $tipoProcedimento->id ?>"><?= $tipoProcedimento->descricao ?></option>
                    <?php } else { ?>
                        <option value="<?= $tipoProcedimento->id ?>"><?= $tipoProcedimento->descricao ?></option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idPaciente">Paciente</label><br>
            <select id="idPaciente" name="idPaciente">
                <option value=""></option>
                <?php foreach ($pacientes as $paciente) { ?>
                    <?php if ($paciente->id == $procedimento->idPaciente) { ?>
                        <option selected value="<?= $paciente->id ?>"><?= $paciente->nome ?> <?= $paciente->sobrenome ?></option>
                    <?php } else { ?>
                        <option value="<?= $paciente->id ?>"><?= $paciente->nome ?> <?= $paciente->sobrenome ?></option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idProfissional">Profissional de Saúde</label><br>
            <select id="idProfissional" name="idProfissional">
                <option value=""></option>
                <?php foreach ($profissionais as $profissional) { ?>
                    <?php if ($profissional->id == $procedimento->idProfissional) { ?>
                        <option selected value="<?= $profissional->id ?>"><?= $profissional->nome ?> <?= $profissional->sobrenome ?></option>
                    <?php } else { ?>
                        <option value="<?= $profissional->id ?>"><?= $profissional->nome ?> <?= $profissional->sobrenome ?></option>
                    <?php } ?>
                <?php } ?>
            </select><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>