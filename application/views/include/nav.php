<?php if ($this->session->logado_admin_sis) { ?>
    <nav>
        <ul>
            <li><a href="<?= base_url('interno/home') ?>">Home</a></li>
            <li><a href="<?= base_url('interno/usuario') ?>">Usuários</a></li>        
            <li><a href="<?= base_url('interno/endereco') ?>">Endereços</a></li>
            <li><a href="<?= base_url('interno/telefone') ?>">Telefones</a></li>
            <li><a href="<?= base_url('interno/convenio') ?>">Convênios</a></li>
            <li><a href="<?= base_url('interno/procedimento') ?>">Procedimentos</a></li>
            <li><a href="<?= base_url('interno/empregado') ?>">Empregados</a></li>
            <li><a href="<?= base_url('interno/cargo') ?>">Cargos</a></li>
            <li><a href="<?= base_url('interno/adicional') ?>">Adicionais</a></li>
            <li><a href="<?= base_url('interno/especialidade') ?>">Especialidades</a></li>
            <li><a href="<?= base_url('interno/empresa') ?>">Empresas</a></li>
            <li><a href="<?= base_url('interno/local') ?>">Locais</a></li>   
        </ul>
    </nav>
<?php } else { ?>
    <nav>
        <ul>
            <li><a href="<?= base_url('interno/home') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="<?= base_url('interno/procedimento') ?>">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i> Procedimentos</a></li>
            <li><a href="<?= base_url('interno/usuario') ?>">
                    <i class="fa fa-users" aria-hidden="true"></i> Usuários</a></li>        
            <li><a href="<?= base_url('interno/endereco') ?>">
                    <i class="fa fa-location-arrow" aria-hid aria-hidden="true"></i> Endereços</a></li>
            <li><a href="<?= base_url('interno/telefone') ?>">
                    <i class="fa fa-phone" aria-hidden="true"></i> Telefones</a></li>
            <?php if ($this->session->logado_admin_emp) { ?>
                <li><a href="<?= base_url('interno/empregado') ?>">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i> Empregados</a></li>
                <li><a href="<?= base_url('interno/adicional') ?>">
                        <i class="fa fa-money" aria-hidden="true"></i> Adicionais</a></li>
                <li><a href="<?= base_url('interno/empresa') ?>">
                        <i class="fa fa-building-o" aria-hidden="true"></i> Empresas</a></li>
                <li><a href="<?= base_url('interno/local') ?>">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Locais</a></li>
                    <?php } ?>
        </ul>
    </nav>
<?php } ?>
<main>