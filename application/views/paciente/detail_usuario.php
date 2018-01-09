<h1>Meus Dados</h1>

<div id="divForm">
    <p>
        <b>Nome completo</b>: <?= $paciente->nome ?> <?= $paciente->sobrenome ?><br>
        <b>Data de Nascimento</b>: <?= date_format(date_create($paciente->dataNasc), 'd/m/Y') ?><br>
        <b>CPF</b>: <?=
        substr($paciente->cpf, 0, 3) . '.' . substr($paciente->cpf, 3, 3) . '.' .
        substr($paciente->cpf, 6, 3) . '-' . substr($paciente->cpf, 9, 2);
        ?><br>
        <b>E-mail</b>: <?= $paciente->email ?><br>
        <b>Nome de usuário</b>: <?= $paciente->nomeUsuario ?><br>
        <br>
        <b>Endereço</b>:<br>
        <?php
        echo " " . $endereco->logradouro . ", " . $endereco->numero . " - ";
        if ($endereco->complemento != "") {
            echo $endereco->complemento . " - ";
        }
        echo $endereco->cidade . " / " . $endereco->estado . " - " . substr($endereco->cep, 0, 2) . '.' .
        substr($endereco->cep, 2, 3) . '-' . substr($endereco->cep, 5, 3);
        ?><br><br>
        <b>Telefone(s)</b>:<br>
        <?php
        foreach ($telefones as $telefone) {
            if (strlen($telefone->numero) == 11) {
                echo '(' . substr($telefone->numero, 0, 2) . ') ' . substr($telefone->numero, 2, 5)
                . '-' . substr($telefone->numero, 7) . '<br>';
            } else {
                echo '(' . substr($telefone->numero, 0, 2) . ') ' . substr($telefone->numero, 2, 4)
                . '-' . substr($telefone->numero, 6) . '<br>';
            }
        }
        ?><br>
        <b>Convênio(s)</b>:<br>
        <?php
        foreach ($convenios as $convenio) {
            echo $convenio->nome . '<br>';
        }
        ?><br>
    </p>
</div>