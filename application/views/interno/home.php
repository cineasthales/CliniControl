<?php if ($this->session->logado_empregado) { ?>
    <h1>Bem-Vindo ao Modo Empregado</h1>
<?php } else if ($this->session->logado_admin_emp) { ?>
    <h1>Bem-Vindo ao Modo Administrador de Empresa</h1>
<?php } else if ($this->session->logado_admin_sis) { ?>
    <h1>Bem-Vindo ao Modo Administrador de Sistema</h1>
<?php } ?>
<br>
<h2>Relatórios</h2>
<span id="btcadastrar"><a href="<?= base_url('relatorio/usuariosPorIdade') ?>" target="_blank">
        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Usuários por Idade</a></span>
<br><br>
<span id="btcadastrar"><a href="<?= base_url('relatorio/usuariosPorConvenio') ?>" target="_blank">
        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Usuários por Convênio</a></span>
<br><br>
<?php if ($this->session->nivel > 1) { ?>
    <span id="btcadastrar"><a href="<?= base_url('relatorio/empregadosPorCargo') ?>" target="_blank">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Empregados por Cargo</a></span>
    <br><br>
    <span id="btcadastrar"><a href="<?= base_url('relatorio/numEmpregadosPorLocal') ?>" target="_blank">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Número de Empregados por Local</a></span>
    <br><br>
<?php } ?>
<span id="btcadastrar"><a href="<?= base_url('relatorio/procedimentosPorPaciente') ?>" target="_blank">
        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Procedimentos por Paciente</a></span>
<br><br>
<span id="btcadastrar"><a href="<?= base_url('relatorio/procedimentosPorProfissional') ?>" target="_blank">
        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Procedimentos por Profissional de Saúde</a></span>
<br><br>
<span id="btcadastrar"><a href="<?= base_url('relatorio/procedimentosPorData') ?>" target="_blank">
        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Procedimentos Realizados por Data</a></span>