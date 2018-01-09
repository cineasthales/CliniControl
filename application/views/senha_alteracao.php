<main>
    <h1>Alteração de Senha</h1><br>
    <div id="divForm">
        <form method="post" action="<?= base_url('home/alterar') ?>">
            <div>
                <label for="senha">Nova Senha</label><br>
                <input type="password" id="senha" name="senha" required><br><br>
            </div>

            <input type="hidden" value="<?= $token ?>" id="token" name="token">
            <div>  
                <input type="submit" value="Enviar"><br><br>
            </div>
        </form>
    </div>