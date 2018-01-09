<h1>Histórico de Procedimentos</h1>
<h2>Paciente: <a href="<?= base_url('paciente/meusdados') ?>"><?= $paciente->nome . " " . $paciente->sobrenome ?></a></h2>

<div id="divForm">
    <?php
    if ($procedimentos) {
        foreach ($procedimentos as $procedimento) {
            ?>
            <hr><br>
            <p>            
                <b><i class="fa fa-calendar" aria-hidden="true"></i></b> <?= date_format(date_create($procedimento->data), 'd/m/Y') ?>
                <b><i class="fa fa-clock-o" aria-hidden="true"></i></b> <?= $procedimento->hora ?><br><br>
                <b><i class="fa fa-user-md" aria-hidden="true"></i></b> <?= $procedimento->tipo ?>
                com <a href="<?= base_url('paciente/profissional/' . $procedimento->idProf) ?>"><?= $procedimento->nomeProf . " " . $procedimento->sobrenomeProf ?></a><br><br>
                <b>Descrição</b>: 
                <?php
                if ($procedimento->descricao) {
                    echo $procedimento->descricao;
                } else {
                    echo 'Não há.';
                }
                ?>
                <br><br>
                <b>Receita</b>: <?= $procedimento->receita ?>
                <?php
                if ($procedimento->receita) {
                    echo $procedimento->receita;
                } else {
                    echo 'Não há.';
                }
                ?>
                <br><br>
                R$ <?= number_format($procedimento->valor, 2, ',', '.') ?><br><br>
                <?php
                if ($procedimento->realizado == TRUE) {
                    echo "<b><span style='color:green'>Realizado</span></b>";
                } else {
                    echo "<b><span style='color:red'>Não Realizado</span></b>";
                }
                ?><br><br>              
            </p>
            <?php
        }
    } else {
        echo "<p>Não há procedimentos.</p>";
    }
    ?>
</div>