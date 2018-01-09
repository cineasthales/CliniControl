<h1>Dados de Profissional de Saúde</h1>

<div id="divForm">
    <p>
        <b>Nome completo</b>: <?= $profissional->nome ?> <?= $profissional->sobrenome ?><br>
        <b>Cargo</b>: <?= $profissional->cargo ?><br>
        <b><?= $profissional->tipoRegistro ?></b>: <?= $profissional->registro ?><br>
        <br>
        <b>Especialidade(s)</b>:<br>
        <?php
        foreach ($especialidades as $especialidade) {
            echo $especialidade->descricao . '<br>';
        }
        ?><br>
        <b>Local(is) de atendimento:</b>:<br>
        <?php foreach ($locais as $local) { ?>
            <a href="<?= base_url('paciente/local/' . $local->idLocal) ?>"><?= $local->descricao ?></a><br>
        <?php } ?><br>
    </p>
</div>