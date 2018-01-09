<main>
<h1>Recuperação de Senha</h1><br>
<div id="divForm">
    <form method="post" action="<?= base_url('home/email') ?>">
        <div>
            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email" required><br><br>
        </div>             
        <div>  
            <input type="submit" value="Enviar"><br><br>
        </div>
    </form>
</div>
