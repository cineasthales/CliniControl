<h1>Novo Procedimento</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('interno/procedimento/grava_inclusao') ?>">
        <div>
            <label for="data">Data</label><br>
            <input type="date" id="data" name="data" required><br><br>
        </div>
        <div>
            <label for="hora">Hora</label><br>
            <input type="text" id="hora" name="hora" required><br><br>
        </div>
        <div>
            <label for="descricao">Descrição</label><br>
            <textarea rows="10" cols="50" maxlength="500" id="descricao" name="descricao"></textarea><br><br>
        </div>
        <div>
            <label for="receita">Receita</label><br>
            <textarea rows="10" cols="50" maxlength="500" id="receita" name="receita"></textarea><br><br>
        </div>
        <div>
            <label for="valor">Valor</label><br>
            <input type="text" id="valor" name="valor" required><br><br>
        </div>
        <div>
            <label for="realizado">Realizado</label><br>
            <input type="radio" name="realizado" id="realizado1" value="1"> Sim<br>
            <input type="radio" name="realizado" id="realizado0" value="0" checked> Não<br><br>
        </div>
        <div>
            <label for="idTipoProcedimento">Tipo de Procedimento</label><br>
            <select id="idTipoProcedimento" name="idTipoProcedimento">
                <option value=""></option>
                <?php foreach ($tiposProcedimento as $tipoProcedimento) { ?>
                    <option value="<?= $tipoProcedimento->id ?>"><?= $tipoProcedimento->descricao ?></option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idPaciente">Paciente</label><br>
            <select id="idPaciente" name="idPaciente">
                <option value=""></option>
                <?php foreach ($pacientes as $paciente) { ?>
                    <option value="<?= $paciente->id ?>"><?= $paciente->nome ?> <?= $paciente->sobrenome ?></option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>
            <label for="idProfissional">Profissional de Saúde</label><br>
            <select id="idProfissional" name="idProfissional">
                <option value=""></option>
                <?php foreach ($profissionais as $profissional) { ?>
                    <option value="<?= $profissional->id ?>"><?= $profissional->nome ?> <?= $profissional->sobrenome ?></option>
                <?php } ?>
            </select><br><br>
        </div>
        <div>  
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>