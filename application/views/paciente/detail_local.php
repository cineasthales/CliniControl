<h1>Dados de Local</h1>

<div id="divForm">
    <p>
        <b>Local</b>: <?= $local->descricao ?><br>
        <b>Empresa</b>: <?= $local->empresa ?><br>        
        <br>
        <b>Endereço</b>:<br>
        <?php
        echo " " . $local->logradouro . ", " . $local->numero . " - ";
        if ($local->complemento != "") {
            echo $local->complemento . " - ";
        }
        echo $local->cidade . " / " . $local->estado . " - " . substr($local->cep, 0, 2) . '.' .
        substr($local->cep, 2, 3) . '-' . substr($local->cep, 5, 3);
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
    </p>
</div>