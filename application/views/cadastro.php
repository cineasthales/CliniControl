<script src="<?= base_url('assets/js/ajax.js') ?>"></script>
<script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>

<main>
    <h1>Cadastre-se!</h1>
    <div id="divForm">
        <form method="post" action="<?= base_url('home/grava_cadastro') ?>">
            <h2>Sobre Você</h2>
            <div>
                <label for="nome">Nome</label> <span class="asterisco">*</span><br>
                <input type="text" id="nome" name="nome" pattern="[A-Za-z]{,50}" 
                       maxlength="50" required><br><br>
            </div>
            <div>
                <label for="sobrenome">Sobrenome</label> <span class="asterisco">*</span><br>
                <input type="text" id="sobrenome" name="sobrenome" 
                       maxlength="100" pattern="[A-Za-z]{,100}" required><br><br>
            </div>
            <div>
                <label for="cpf">CPF</label> <span class="asterisco">*</span>
                <span id="msgCpf" name="msgCpf"></span><br>
                <small>Apenas os 11 dígitos.</small><br>
                <input type="text" id="cpf" name="cpf" title="Apenas os 11 dígitos."
                       maxlength="11" pattern="[0-9]{11}" required><br><br>
            </div>
            <div>
                <label for="dataNasc">Data de Nascimento</label> <span class="asterisco">*</span><br>
                <input type="date" id="dataNasc" name="dataNasc" required><br><br>
            </div>               
            <div>
                <label for="idCargo">Cargo</label> <span class="asterisco">*</span><br>
                <select id="idCargo" name="idCargo">
                    <?php foreach ($cargos as $cargo) { ?>
                        <option value="<?= $cargo->id ?>"><?= $cargo->descricao ?></option>
                    <?php } ?>
                </select><br><br>
            </div>
            <div>
                <label for="registro">Registro Profissional</label> <span class="asterisco">*</span><br>
                <small>Apenas os dígitos.</small><br>
                <input type="text" id="registro" name="registro" required
                       pattern="[0-9]{,50}" maxlength="50" title="Apenas os dígitos."><br><br>
            </div>        
            <div>
                <label for="email">E-mail</label> <span class="asterisco">*</span>
                <span id="msgEmail" name="msgEmail"></span><br>
                <input type="email" id="email" name="email" required
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br><br>
            </div>
            <div>
                <label for="nomeUsuario">Nome de Usuário</label> <span class="asterisco">*</span>
                <span id="msgNomeUsuario" name="msgNomeUsuario"></span><br>
                <input type="text" id="nomeUsuario" name="nomeUsuario" required
                       pattern="[A-Za-z0-9]{,50}" maxlength="50"><br><br>
            </div>
            <div>
                <label for="senha">Senha</label> <span class="asterisco">*</span><br>
                <input type="password" id="senha" name="senha" 
                       title="Mínimo 8 caracteres, pelo menos uma letra maiúscula, uma letra minúscula e um dígito." required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" maxlength="32"><br><br>
            </div>            
            <br><h2>Seu Endereço</h2>
            <div>
                <label for="CEP">CEP</label> <span class="asterisco">*</span><br>
                <small>Apenas os 8 dígitos.</small><br>
                <input type="text" id="cep" name="cep" required title="Apenas os 8 dígitos."
                       title="Apenas números." pattern="[0-9]{8}" maxlength="8"><br><br>
            </div>
            <div>
                <label for="logradouro">Logradouro</label><br>
                <input type="text" id="logradouro" name="logradouro" required readonly><br><br>
            </div>
            <div>
                <label for="numero">Número</label> <span class="asterisco">*</span><br>
                <input type="text" id="numero" name="numero" required
                       pattern="[0-9]{,12}" maxlength="12"><br><br>
            </div>
            <div>
                <label for="complemento">Complemento</label><br>
                <input type="text" id="complemento" name="complemento"
                       pattern="[A-Za-z0-9]{,100}" maxlength="100"><br><br>
            </div>
            <div>
                <label for="cidade">Cidade</label><br>
                <input type="text" id="cidade" name="cidade" required readonly><br><br>
            </div>
            <div>
                <label for="estado">Estado</label><br>
                <input type="text" id="estado" name="estado" required readonly><br><br>
            </div>
            <br><h2>Sobre Sua Empresa</h2>
            <div>
                <label for="razaoSocial">Razão Social</label> <span class="asterisco">*</span><br>
                <input type="text" id="razaoSocial" name="razaoSocial" required
                       pattern="[A-Za-z]{,100}" maxlength="100"><br><br>
            </div>
            <div>
                <label for="nomeFantasia">Nome</label> <span class="asterisco">*</span><br>
                <input type="text" id="nomeFantasia" name="nomeFantasia" required
                       pattern="[A-Za-z0-9]{,50}" maxlength="50"><br><br>
            </div>                
            <div>
                <label for="cnpj">CNPJ</label> <span class="asterisco">*</span>
                <span id="msgCnpj" name="msgCnpj"></span><br>
                <small>Apenas os 14 dígitos.</small><br>
                <input type="text" id="cnpj" name="cnpj" required
                       pattern="[0-9]{14}" title="Apenas os 14 dígitos."
                       maxlength="14"><br><br>
            </div>
            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
            <br>
            <div>  
                <input type="submit" value="Enviar"><br><br>
            </div>
        </form>
    </div>
