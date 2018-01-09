<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CliniControl</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url('assets/css/estilo_movel.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/estilo_pc.css') ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <div id="tudo">
            <header>
                <div id="divLogo">
                    <a href="<?= base_url('home') ?>"><img id="logoimg" name="logoimg" src="<?= base_url('assets/img/logo.png') ?>"
                                                           alt="Logo CliniControl"></a>
                </div>
                <div id="divSessao">
                    Olá, <?= $this->session->userdata('nome') ?>!
                    <a href="<?= base_url('home/sair') ?>">Sair</a>
                </div>
            </header>